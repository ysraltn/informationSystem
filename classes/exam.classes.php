<?php
class Exam extends Dbh{
    protected function getAll(){
        $statement = $this->connect()->prepare('SELECT exams.id, users.name, users.surname, classes.className, lessons.lessonName, exams.examScore, exams.examDate, AVG(examScore) OVER (PARTITION BY exams.lessonId) as lessonAverage FROM exams LEFT JOIN users ON users.id = exams.studentId LEFT JOIN classes ON exams.classId = classes.Id LEFT JOIN lessons ON exams.lessonId = lessons.id;');

        if (!$statement->execute()) {
            $statement = null;
            header("location: ../home.php?error=statementfailed");
            exit();
        }

        $exams = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $exams;
    }

    protected function deleteEById($id){
        $statement = $this->connect()->prepare('DELETE FROM exams WHERE exams.id = ?;');

        if (!$statement->execute(array($id))) {
            $statement = null;
            header("location: ../home.php?error=statementfailed");
            exit();
        }
    }

    protected function getEById($id){
        $statement = $this->connect()->prepare('SELECT exams.id, exams.examScore, lessons.lessonName, lessons.teacherUserId, classes.classTeacherId, classes.className, users.name, users.surname FROM exams LEFT JOIN users ON users.id = exams.studentId LEFT JOIN lessons ON exams.lessonId = lessons.id LEFT JOIN classes ON classes.id = exams.classId WHERE exams.id = ?;');

        if (!$statement->execute(array($id))) {
            $statement = null;
            header("location: ../home.php?error=statementfailed");
            exit();
        }
        $exam = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $exam;
    } 
    
    protected function updateEById($id, $score){
        $statement = $this->connect()->prepare('UPDATE exams SET exams.examScore = ? WHERE exams.id = ?;');

        if (!$statement->execute(array($score, $id))) {
            $statement = null;
            header("location: ../home.php?error=statementfailed");
            exit();
        }
    }    

    protected function getEByTId($id){
        $statement = $this->connect()->prepare('SELECT exams.id, users.name, users.surname, classes.className, lessons.lessonName, exams.examScore, exams.examDate, AVG(examScore) OVER (PARTITION BY exams.lessonId) as lessonAverage FROM exams LEFT JOIN users ON users.id = exams.studentId LEFT JOIN classes ON exams.classId = classes.Id LEFT JOIN lessons ON exams.lessonId = lessons.id WHERE lessons.teacherUserId = ?;');

        if (!$statement->execute(array($id))) {
            $statement = null;
            header("location: ../home.php?error=statementfailed");
            exit();
        }
        $exams = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $exams;
    } 

    protected function getEBySId($id){
        $statement = $this->connect()->prepare('SELECT exams.id, users.name, users.surname, classes.className, lessons.lessonName, exams.examScore, exams.examDate, AVG(examScore) OVER (PARTITION BY exams.lessonId) as lessonAverage FROM exams LEFT JOIN users ON users.id = exams.studentId LEFT JOIN classes ON exams.classId = classes.Id LEFT JOIN lessons ON exams.lessonId = lessons.id WHERE exams.studentId = ?;');

        if (!$statement->execute(array($id))) {
            $statement = null;
            header("location: ../home.php?error=statementfailed");
            exit();
        }
        $exams = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $exams;
    } 
}