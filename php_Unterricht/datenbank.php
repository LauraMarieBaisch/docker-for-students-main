<?php
$dsn = 'mysql:dbname=shoutbox;host=db;port=3306';
try {
$db = new PDO( $dsn, 'root', '' );
} catch ( PDOException $e ) {
exit( 'Connect failed: '.$e->getMessage() );
}
echo 'Connection established!';
// close DB connection
// if not needed anymore

class Db extends PDO {
    public function query(string $statement,?int  $mode = PDO::FETCH_ASSOC, mixed ...$fetch_mode_args): PDOStatement|false {
    try {
    return parent::query($statement, $mode, ...$fetch_mode_args);
    } catch (PDOException $e) {
    echo '<br/>DB ERROR: ' . $e->getMessage(); echo '<br/>Query: ' . $statement;
    return false;
    } }
    }
    $query = 'SELECT vorname, nachname FROM student ORDER BY nachname, vorname';
    $res = $db->query( $query );
    $res->setFetchMode(PDO::FETCH_OBJ);
    foreach( $res as $row ) {
    echo '<br />'.$row->nachname.', '.$row->vorname;
    }
    try {
        // ...existing PDO MySQL DB connection...
        $query = 'SELECT vorname, nachname FROM student ORDER BY nachname, vorname';
        $res = $db->query( $query );
        foreach( $res as $row ) {
        echo '<br />'.$row['nachname'].', '.$row['vorname']; // oder indiziert
        echo '<br />'.$row['1'].', '.$row['0'];
        }
        // free result set
        unset( $res );
        } catch ( PDOException $e ) {
        var_dump( $db->errorInfo() ); }
$query = 'INSERT INTO student (vorname, nachname) VALUES (?,?)';
$stmt = $db->prepare( $query );
$stmt->bindParam( 1, $vorname, PDO::PARAM_STR ); $stmt->bindParam( 2, $nachname, PDO::PARAM_STR ); $vorname = 'Ernst'; $nachname = 'Voller'; $stmt->execute(); $vorname = 'Rainer'; $nachname = 'Zufall'; $stmt->execute();
echo $stmt->rowCount().' Row inserted.';
// free result set
unset( $res );
$query = 'SELECT vorname, nachname FROM student ORDER BY nachname, vorname';
$res = $db->query( $query );
foreach( $res as $row ) {
echo '<br />'.$row['nachname'].', '.$row['vorname']; // oder indiziert
echo '<br />'.$row['1'].', '.$row['0'];
}
// free result set
unset( $res );
 
unset( $db );