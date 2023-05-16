<?php
class Transaction {
    private $db;

    public function __construct(){
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function addTransaction($transactionData){
        // Prepare Query
        $query = "INSERT INTO online_finetrans (customer_id, amount, status) VALUES (?, ?, ?)";

        // Prepare statement and bind parameters
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("isi", $transactionData['customer_id'], $transactionData['amount'], $transactionData['status']);

        // Execute statement
        $stmt->execute();

        // Check for errors
        if ($stmt->error) {
            die("Error adding transaction: " . $stmt->error);
        }

        // Close statement
        $stmt->close();
    }

    public function getTransactions(){
        // Prepare Query
        $query = "SELECT * FROM online_finetrans";

        // Execute query
        $result = $this->db->query($query);

        // Fetch result as array of objects
        $transactions = [];
        while ($transaction = $result->fetch_object()) {
            $transactions[] = $transaction;
        }

        // Close result
        $result->close();

        // Return transactions
        return $transactions;
    }
}

