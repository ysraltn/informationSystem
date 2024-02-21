<?php
class ClassE extends Dbh{
    protected function getAll(){
        $statement = $this->connect()->prepare('SELECT classes.id, classes.className, users.name, users.surname, AVG(exams.examScore) as averageScore FROM classes LEFT JOIN users ON users.id = classes.classTeacherId LEFT JOIN exams ON classes.id = exams.classId GROUP BY exams.classId, classes.className, users.name, users.surname;');

        if (!$statement->execute()) {
            $statement = null;
            header("location: ../home.php?error=statementfailed");
            exit();
        }

        $classes = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $classes;
    }

    protected function getCStudents($id){
        $statement = $this->connect()->prepare('SELECT classesstudents.studentId, classes.className, users.name, users.surname FROM classesstudents LEFT JOIN users ON classesstudents.studentId = users.id LEFT JOIN classes ON classes.id = classesstudents.classId WHERE classesstudents.classId = ? ;');

        if (!$statement->execute(array($id))) {
            $statement = null;
            header("location: ../home.php?error=statementfailed");
            exit();
        }

        $students = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $students;
    }

    protected function getCByTId($id){
        $statement = $this->connect()->prepare('SELECT classes.id, classes.className, users.name, users.surname, AVG(exams.examScore) as averageScore FROM classes LEFT JOIN users ON users.id = classes.classTeacherId LEFT JOIN exams ON classes.id = exams.classId WHERE classes.classTeacherId = ? GROUP BY exams.classId, classes.className, users.name, users.surname;');

        if (!$statement->execute(array($id))) {
            $statement = null;
            header("location: ../home.php?error=statementfailed");
            exit();
        }

        $classes = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $classes;
    }

    protected function getCStudentsByTId($id){
        $statement = $this->connect()->prepare('SELECT classesstudents.studentId, classes.className, users.name, users.surname FROM classesstudents LEFT JOIN users ON classesstudents.studentId = users.id LEFT JOIN classes ON classes.id = classesstudents.classId WHERE classes.classTeacherId = ? ;');

        if (!$statement->execute(array($id))) {
            $statement = null;
            header("location: ../home.php?error=statementfailed");
            exit();
        }

        $students = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $students;
    }

    protected function addC($className, $classTeacherId){
        $statement = $this->connect()->prepare('INSERT INTO classes (classes.className, classes.classTeacherId) VALUES (?, ?);');

        if (!$statement->execute(array($className, $classTeacherId))) {
            $statement = null;
            header("location: ../classes.php?error=statementfailed");
            exit();
        }
    }

    protected function addSToC($studentId, $classId){
        $statement = $this->connect()->prepare('INSERT INTO classesstudents (classesstudents.studentId, classesstudents.classId) VALUES (?, ?);');

        if (!$statement->execute(array($studentId, $classId))) {
            $statement = null;
            header("location: ../classes.php?error=statementfailed");
            exit();
        }
    }

    protected function deleteSFromC($studentId, $classId){
        $statement = $this->connect()->prepare('DELETE FROM classesstudents WHERE classesstudents.studentId = ? AND classesstudents.classId;');

        if (!$statement->execute(array($studentId, $classId))) {
            $statement = null;
            header("location: ../classes.php?error=statementfailed");
            exit();
        }
    }
}