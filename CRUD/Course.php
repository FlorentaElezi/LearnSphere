<?php
class Course {
    private $conn;
    private $table_name = 'kurset';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function deleteCourse($courseId) {
        try {
            $query = "DELETE FROM {$this->table_name} WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $courseId);

            if ($stmt->execute()) {
                return true;
            }
            return false; 
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getCourses() {
        try {
            $query = "SELECT * FROM {$this->table_name}";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);  
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getCourseById($courseId) {
        try {
            $query = "SELECT * FROM {$this->table_name} WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $courseId);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);  
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function updateCourse($courseId, $courseName, $lecturer, $photo) {
        try {
            $query = "UPDATE {$this->table_name} SET 
                      CourseName = :courseName, 
                      Lecturer = :lecturer, 
                      photo = :photo 
                      WHERE id = :id";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':id', $courseId);
            $stmt->bindParam(':courseName', $courseName);
            $stmt->bindParam(':lecturer', $lecturer);
            $stmt->bindParam(':photo', $photo, PDO::PARAM_LOB);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function addCourse($courseName, $lecturer, $photo) {
        try {
            $query = "INSERT INTO {$this->table_name} (CourseName, Lecturer, Photo) 
                      VALUES (:courseName, :lecturer, :photo)";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':courseName', $courseName);
            $stmt->bindParam(':lecturer', $lecturer);
            $stmt->bindParam(':photo', $photo);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>
