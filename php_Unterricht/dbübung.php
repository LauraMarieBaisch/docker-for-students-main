<?php try {
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