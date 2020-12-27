$filename = "lifesavingsports-joomla.zip"
if (Test-Path $filename) {
  Remove-Item -Path $filename -Force
}
Compress-Archive -Path dlrgrs.xml, LICENSE, admin, site -DestinationPath $filename