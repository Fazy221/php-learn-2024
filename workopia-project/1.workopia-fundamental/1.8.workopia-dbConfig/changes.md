## Adding Database.php which includes DB class 
## Constructor which on insaniation, takes in config arr from config/db.php as param which includes host,port,dbname,user,password
## The class takes this arr in public/index.php where both class & config file is required then class insaniated and arr returning from config is passed inside
## As $conn is defined in start without val, we later access in try block to insaniate new PDO which takes in $dns, $username and $password
    - In case of successful connection, we can test by echoing out 'DB connected successfully'
## The PDO error mode is set as exception "PDO::ATRR_ERRMODE is set to ERRMODE_EXCEPTION" so could be thrown in else block if db fail 