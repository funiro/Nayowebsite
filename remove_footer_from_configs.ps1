$configFiles = @('mail_config.php')

foreach ($file in $configFiles) {
    $content = Get-Content $file -Raw
    
    # Remove footer include if it exists
    $content = $content -replace '(?s)<!-- Include footer -->.*?<?php include ''includes/footer.php''; ?>', ''
    
    # Save the updated content
    Set-Content -Path $file -Value $content
    Write-Host "Fixed: $file"
}
