<?php
class Student extends Dbh
{
    protected function getAll()
    {
        $statement = $this->connect()->prepare('SELECT users.id, users.name, users.surname, exams.classId, classes.className, AVG(examScore) AS averageScore FROM users LEFT JOIN exams ON users.id = exams.studentId LEFT JOIN classes ON exams.classId = classes.id WHERE users.role=3 GROUP BY users.id;');

        if (!$statement->execute()) {
            $statement = null;
            header("location: ../home.php?error=statementfailed");
            exit();
        }

        $students = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $students;
    }

    protected function getSById($id){
        $statement = $this->connect()->prepare('SELECT users.name, users.surname, users.username, users.role, classes.id AS classId, classes.className FROM users LEFT JOIN classesstudents ON users.id = classesstudents.studentId LEFT JOIN classes ON classes.id = classesstudents.classId WHERE users.id = ?;');

        if (!$statement->execute(array($id))) {
            $statement = null;
            header("location: ../home.php?error=statementfailed");
            exit();
        }

        $student = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $student;
    }

    protected function getEById($id){
        $statement = $this->connect()->prepare('SELECT users.name, users.surname, lessons.lessonName, exams.examScore, exams.examDate FROM exams LEFT JOIN users ON users.id = exams.studentId LEFT JOIN lessons ON exams.lessonId = lessons.id WHERE exams.studentId = ?;');

        if (!$statement->execute(array($id))) {
            $statement = null;
            header("location: ../home.php?error=statementfailed");
            exit();
        }

        $exams = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $exams;
    }

    protected function setEById($id, $lessonId, $classId ,$score){
        $statement = $this->connect()->prepare('INSERT INTO exams (studentId, lessonId, classId, examScore) VALUES (?,?,?,?);');

        if (!$statement->execute(array($id, $lessonId, $classId ,$score))) {
            $statement = null;
            header("location: ../home.php?error=statementfailed");
            exit();
        }
    }

    protected function deleteSById($id){
        $statement = $this->connect()->prepare('DELETE FROM users WHERE users.id = ? AND users.role = 3;');
        if (!$statement->execute(array($id))) {
            $statement = null;
            header("location: ../home.php?error=statementfailed");
            exit();
        }
        $statement = $this->connect()->prepare('DELETE FROM classesstudents WHERE classesstudents.studentId = ?;');
        if (!$statement->execute(array($id))) {
            $statement = null;
            header("location: ../home.php?error=statementfailed");
            exit();
        }
    }

    protected function getAllT()
    {
        $statement = $this->connect()->prepare('SELECT users.id, users.name, users.surname FROM users WHERE users.role=2;');

        if (!$statement->execute()) {
            $statement = null;
            header("location: ../home.php?error=statementfailed");
            exit();
        }

        $teachers = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $teachers;
    }
    

}
