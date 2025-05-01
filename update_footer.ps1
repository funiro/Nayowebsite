$files = Get-ChildItem -Path "c:\xampp\htdocs\dashboard\nayo-website" -Filter "*.php" -File

foreach ($file in $files) {
    $content = Get-Content $file.FullName -Raw
    
    # Check if file has a footer section
    if ($content -match '<footer>') {
        # Replace footer with include statement
        $newContent = $content -replace '(?s)<footer>.*?</footer>', '<!-- Include footer -->`n    <?php include ''includes/footer.php''; ?>'
        
        # Update all href attributes to use .php instead of .html
        $newContent = $newContent -replace 'href="(.*?)\.html"', 'href="$1.php"'
        
        # Save the updated content
        Set-Content -Path $file.FullName -Value $newContent
        Write-Host "Updated: $($file.Name)"
    }
}
