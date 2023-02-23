$uri = 'https://notify-api.line.me/api/notify'
$token = 'hg0jO732X/RRWds98ceuIYYcGSWBYvmWq4jTfWTME0lGJozUWjo0yyhzBnWObpstqC/2gzPgBP31uswd58GAxFE/8RL73GTXDxj/k5fyRA2QfbddQ0cJj6gTDkPtuOWvgUN9Xpp2FG2XfR6vbMiQRgdB04t89/1O/w1cDnyilFU='
$header = @{Authorization = $token}
$body = @{message = 'แจ้งเตือน : คนนี้แอบรีโมทมาน่ะ ' + $env:UserName + ' on ' + $env:ComputerName }
$res = Invoke-RestMethod -Uri $uri -Method Post -Headers $header -Body $body
echo $res