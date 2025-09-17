param([string]$name)

# Lấy timestamp
$timestamp = Get-Date -Format "yyyyMMddHHmmss"

# Ghép tên file
$filename = "$timestamp" + "_" + $name + ".php"

# Tạo file
New-item -Name $filename -ItemType "file"

Write-Output "Created migrations\$filename" 

# Cách chạy: powershell -ExecutionPolicy Bypass -File .\create.ps1 'filename'