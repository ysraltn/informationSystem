<?php
class Lesson extends Dbh{
    protected function getAll(){
        $statement = $this->connect()->prepare('SELECT lessons.id, lessons.lessonName, users.name, users.surname FROM lessons LEFT JOIN users ON users.id = lessons.teacherUserId;');

        if (!$statement->execute()) {
            $statement = null;
            header("location: ../lessons.php?error=statementfailed");
            exit();
        }

        $lessons = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $lessons;
    }

    protected function addL($lessonName, $teacherId){
        $statement = $this->connect()->prepare('INSERT INTO lessons(lessons.lessonName, lessons.teacherUserId) VALUES(?, ?);');

        if (!$statement->execute(array($lessonName, $teacherId))) {
            $statement = null;
            header("location: ../lessons.php?error=statementfailed");
            exit();
        }
    }

    protected function getLById($id){
        $statement = $this->connect()->prepare('SELECT lessons.id, lessons.lessonName, users.name, users.surname, lessons.teacherUserId FROM lessons LEFT JOIN users ON users.id = lessons.teacherUserId WHERE lessons.id = ?;');

        if (!$statement->execute(array($id))) {
            $statement = null;
            header("location: ../lessons.php?error=statementfailed");
            exit();
        }

        $lesson = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $lesson;
    }

    protected function deleteLById($id){
        $statement = $this->connect()->prepare('UPDATE exams SET exams.lessonId = NULL WHERE exams.lessonId = ?;');

        if (!$statement->execute(array($id))) {
            $statement = null;
            header("location: ../lessons.php?error=statementfailed");
            exit();
        }

        $statement = $this->connect()->prepare('DELETE FROM lessons WHERE lessons.id = ?;');

        if (!$statement->execute(array($id))) {
            $statement = null;
            header("location: ../lessons.php?error=statementfailed");
            exit();
        }
    }

    protected function updateLById($id, $teacherId, $lessonName){
        $statement = $this->connect()->prepare('UPDATE lessons SET lessons.lessonName = ?, lessons.teacherUserId = ? WHERE lessons.id = ?;');

        if (!$statement->execute(array($lessonName, $teacherId, $id))) {
            $statement = null;
            header("location: ../lessons.php?error=statementfailed");
            exit();
        }
    }

    protected function getLByTId($id){
        $statement = $this->connect()->prepare('SELECT lessons.id, lessons.lessonName, users.name, users.surname, lessons.teacherUserId FROM lessons LEFT JOIN users ON users.id = lessons.teacherUserId WHERE lessons.teacherUserId = ?;');

        if (!$statement->execute(array($id))) {
            $statement = null;
            header("location: ../lessons.php?error=statementfailed");
            exit();
        }

        $lessons = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $lessons;
    }

    
}