<html>
    <head><style>
            .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #586131;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #FFEB28 ;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid ;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #E7D525 ;
}
</style>
        <title>LeaderBoard Using PHP</title>
    </head>
  
    <body>
        <h2>Welcome To LeaderBoard</h2>
        <table class="styled-table">
            <tr>
                <td>Ranking</td>
                <td>UserName</td>
                <td>Points</td>
            </tr>
            
<?php
/* Connection Variable ("Servername",
"username","password","database") */
$con = new mysqli("localhost", 
        "root", "1Q@z0plm123", "leaderboard");
  
/* Mysqli query to fetch rows 
in descending order of marks */
$result = mysqli_query($con, "SELECT userName, 
marks FROM leaderboard ORDER BY marks DESC");
  
/* First rank will be 1 and 
    second be 2 and so on */
$ranking = 1;
  
/* Fetch Rows from the SQL query */
if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr><td>{$ranking}</td>
        <td>{$row['userName']}</td>
        <td>{$row['marks']}</td></tr>";
        
        $ranking++;
    }
}

$sql = "UPDATE leaderboard SET marks=marks+2 WHERE userName='Pradeep'";

if ($con->query($sql) === TRUE){
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr><td>{$ranking}</td>
        <td>{$row['userName']}</td>
        <td>{$row['marks']}</td></tr>";
        
        $ranking++;
    }}
    else {
        echo "Error updating record: " . $conn->error;
      }

?>
</table>
</body>
</html>