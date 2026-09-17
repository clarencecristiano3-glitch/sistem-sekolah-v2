<?php
namespace App\Models;
require_once '../app/core/Database.php';

use App\Core\Database;

class Student extends Database
{
    protected $table = 'students';

    public function getStudents()
    {
        $students = [];

        $query = "SELECT * from {$this->table}";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $result = $stmt->get_result();

        while ($student = $result->fetch_assoc()) {
            $students[] = $student;
        }

        return $students;
    }

    public function getStudent(int $id)
    {
        $query = "SELECT * from {$this->table} where id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $student = $result->fetch_assoc();

        return $student;
    }

    public function createStudent(string $name, string $email)
    {
        $query = "INSERT INTO {$this->table} (name, email) VALUES (?, ?)";

        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('ss', $name, $email);
        $stmt->execute();

        return $stmt->insert_id;
    }
    //fungsi menambah siswa baru
    public function insert (array $data)
    {
        $name = htmlspecialchars($data['name']);
        $nis = htmlspecialchars($data['nis']);
        $class = htmlspecialchars($data['class']);
        $phoneNumber = htmlspecialchars($data['phone_number']);

        $query = "INSERT INTO {$this->table} (name, nis, class, phone_number) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('ssss', $name, $nis, $class, $phoneNumber);

        $stmt->execute();

       if ($stmt->affected_rows > 0) {
           header('Location: /students');
           exit;
        } else {
            echo 'Error to store student '. $stmt->error;    
        }
    }
        //fungsi mengupdate data siswa
        
         public function update(array $data, int $id)
    {
        $name = htmlspecialchars($data['name']);
        $nis = htmlspecialchars($data['nis']);
        $class = htmlspecialchars($data['class']);
        $phoneNumber = htmlspecialchars($data['phone_number']);

        $query = "UPDATE {$this->table} SET name = ?,nis = ?, class = ?,phone_number = ? WHERE id =?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('ssssi', $name, $nis, $class, $phoneNumber, $id);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
           header('Location: /students');
           exit;
        } else {
            echo 'Error to update student '. $stmt->error;    
        }
    }

    //fungsi menghapus data siswa
    public function delete(int $id)
    {
        $query = "DELETE FROM {$this->table} WHERE id = ?";
        
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header('Location: /students');
            exit;
        } else {
            echo 'Error to delete student '. $stmt->error;
        }
    }
}