<?
session_start();
function navList($list) {
    $item = '';
    foreach ($list as $key => $value) {
        if ($key === $_GET['page']) :
            $active = 'active';
        else:
            $active = '';
        endif;
        if ($value['user'] && $_SESSION['login']) {
            $item .= "<li><a href='/$key' class='menu__list-link $active'><i class='fas $value[icon]'></i>$value[name]</a></li>";
        }elseif ($value['user'] === false) {
            $item .= "<li><a href='/$key' class='menu__list-link $active'><i class='fas $value[icon]'></i>$value[name]</a></li>";
        };
    };
    return $item;
}

function showDate() {
    $month = [
        '',
        'январь',
        'февраль',
        'март',
        'апрель',
        'май',
        'июнь',
        'июль',
        'август',
        'сентябрь',
        'октябрь',
        'ноябрь',
        'декабрь'
    ];
    $day = date('d');
    $year = date('o');
    return "Cегодня $day " . $month[date('n')] . " $year года";
}

function pdo() {
    $dbname = 'guruh1930';
    $user = 'root';
    $pass = '';
    return new PDO("mysql:host=127.0.0.1;dbname=$dbname", $user, $pass);
}
function confirm($table,$sort = '',$where = '',$arr = []) {
    $pdo = pdo();
    $query = "SELECT * FROM $table ";
    $query .= $sort;
    $query .= $where;
    $query = trim($query);
    $answer = $pdo->prepare($query);
    $answer->execute($arr);
    $result = $answer->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function regist() {
    $pdo = pdo();
    $password = md5($_POST['pass']);
    $answer = $pdo->prepare("INSERT INTO users (name,login,password) VALUES(?,?,?)");
    $answer->execute([$_POST['name'],$_POST['login'],$password]);
}

function addComment() {
    $pdo = pdo();
    $time = date('H:i:s');
    $query = $pdo->prepare("INSERT INTO comments (name,login,text,time) VALUES(?,?,?,?)");
    $query->execute([$_POST['name'],$_POST['login'],$_POST['descr'],$time]);
}

function delComment() {
    $pdo = pdo();
    $query = $pdo->prepare("DELETE FROM comments WHERE id=:id");
    $query->execute(['id'=>$_GET['id']]);
}

function editComment() {
    $pdo = pdo();
    $time = date('H:i:s');
    $query = $pdo->prepare("UPDATE comments SET text=:matn, time=:vaqt, WHERE id=:id");
    $query->execute([
        'matn'=>$_POST['descr'],
        'vaqt'=>$time,
        'id'=>$_GET['id']
    ]);
}
?>
