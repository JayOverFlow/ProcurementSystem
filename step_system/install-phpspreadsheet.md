# PhpSpreadsheet Installation Instructions

To fix the "Class 'PhpOffice\PhpSpreadsheet\IOFactory' not found" error, follow these steps:

1. Open a terminal/command prompt
2. Navigate to your project root directory (step_system folder)
3. Run the following command:

```bash
composer require phpoffice/phpspreadsheet
```

4. Wait for the installation to complete
5. Restart your web server

This will install the PhpSpreadsheet library and its dependencies properly.

If you're using Docker or another containerized environment, you may need to run the command inside your PHP container.
