<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Doctrine\DBAL\DriverManager;
use Illuminate\Support\Facades\Log;
use Exception;

class DatabaseSyncController extends Controller
{
    public function syncRemoteDatabase()
    {
        try {
            $localConnection = DB::connection();
            $remoteConnectionParams = config('database.connections.remote');

            // Create the remote database connection
            $remoteConnection = DriverManager::getConnection($remoteConnectionParams);

            // Test the remote database connection
            $this->testRemoteConnection($remoteConnection);

            // Specify tables to be excluded during synchronization
            $excludedTables = ['table1'];

            // Synchronize tables, excluding specified tables
            $this->synchronizeTables($localConnection, $remoteConnection, $excludedTables);

            return redirect()->back()->withSuccess('Remote Sync Successful!');
        } catch (Exception $e) {
            Log::error('Database synchronization failed: ' . $e->getMessage());
            return redirect()->back()->withErrors('Failed to sync remote database. Please check logs for details.');
        }
    }

    private function testRemoteConnection($remoteConnection)
    {
        $remoteConnection->query('SELECT 1');
        echo 'Remote database connection is successful. Now Syncing Databases';
    }

    private function synchronizeTables($localConnection, $remoteConnection, $excludedTables = [])
    {
        // Get all table names from the local database
        $tables = $localConnection->getDoctrineSchemaManager()->listTableNames();

        foreach ($tables as $table) {
            // Check if the current table is in the list of excluded tables
            if (in_array($table, $excludedTables)) {
                continue; // Skip this table and move to the next one
            }

            // Get the primary key column name of the table
            $pkColumn = $localConnection->getDoctrineSchemaManager()->listTableDetails($table)->getPrimaryKey()->getColumns()[0];

            // Get all rows from the local table
            $rows = $localConnection->table($table)->orderBy($pkColumn)->get();

            // Delete all rows from the remote table
            $remoteConnection->executeUpdate("DELETE FROM $table");

            // Insert rows into the remote table in batches
            $batchSize = 500;
            foreach ($rows->chunk($batchSize) as $chunk) {
                $values = [];
                foreach ($chunk as $row) {
                    $row = (array) $row;
                    $values[] = '(' . implode(',', array_map([$this, 'quoteValue'], $row)) . ')';
                }
                $sql = "INSERT INTO $table (" . implode(',', array_keys((array) $chunk->first())) . ") VALUES " . implode(',', $values);
                $remoteConnection->executeUpdate($sql);
            }
        }

        echo 'Remote database sync is successful';
    }

    private function quoteValue($value)
    {
        if (is_string($value)) {
            return "'" . addslashes($value) . "'";
        } elseif (is_numeric($value)) {
            return $value;
        } elseif (is_bool($value)) {
            return $value ? '1' : '0';
        } elseif ($value === null) {
            return 'NULL';
        }
    }
}
