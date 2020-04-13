<?php 
  // 24 января 1985 года
  $birthday = mktime(0, 0, 0, 1, 24, 1985);
  echo birthday($birthday);

  // Количество лет, месяцев и дней, прошедших со дня рождения
  function birthday($sec_birthday)
  {
    // Сегодняшняя дата
    $sec_now = time();
    // Подсчитываем количество месяцев, лет
    for($time = $sec_birthday, $month = 0; 
        $time < $sec_now; 
        $time = $time + date('t', $time) * 86400, $month++){
        $rtime = $time;
        }
    $month = $month - 1;
    // Количество лет
    $year = intval($month / 12);
    // Количество месяцев
    $month = $month % 12;
    // Количество дней
    $day = intval(($sec_now - $rtime) / 86400);
    $result = declination($year, "год", "года", "лет")." ";
    $result .= declination($month, "месяц", "месяца", "месяцев")." ";
    $result .= declination($day, "день", "дня", "дней")." ";
    return $result;
  }

  // Склонение числа $num
  function declination($num, $one, $ed, $mn, $notnumber = false)
  {  
    // $one="статья";  
    // $ed="статьи";  
    // $mn="статей";  
    if($num === "") print "";
    if(($num == "0") or (($num >= "5") and ($num <= "20")) or preg_match("|[056789]$|",$num))
      if(!$notnumber)
        return "$num $mn";
      else
        return $mn;
    if(preg_match("|[1]$|",$num))
      if(!$notnumber)
        return "$num $one";
      else
        return $one;
    if(preg_match("|[234]$|",$num))
      if(!$notnumber)
        return "$num $ed";
      else
        return $ed;
  }
?>
