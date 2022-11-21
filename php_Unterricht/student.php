class Db extends PDO {
public function query($statement, $mode = PDO::FETCH_ASSOC, ...$fetch_mode_args) {
try {
return parent::query($statement, $mode, ...$fetch_mode_args);
} catch (PDOException $e) {
echo '<br/>DB ERROR: ' . $e->getMessage(); echo '<br/>Query: ' . $statement;
return false;
} }
}