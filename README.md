###php日志打印
* 引入``FileLog.php``文件
```
<?php

require_once __DIR__."/FileLog.php";

$log = new FileLog();

$arr = [1,2,3];
$log->println($arr,2);

```
