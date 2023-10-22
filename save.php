<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримуємо відредаговані переклади з прихованого поля форми
    $updatedTranslationsText = $_POST['translations'];

    if (!empty($updatedTranslationsText)) {
        // Завантажуємо існуючі дані з файлу js/lang.js
        $jsContent = file_get_contents('js/lang.js');

        if ($jsContent) {
            // Видаляємо частину змінної JavaScript "const langArr ="
            $jsContent = str_replace("const langArr =", "", $jsContent);

            // Заміняємо вміст файлу на відредаговані переклади (в текстовому вигляді)
            $updatedJsContent = "const langArr = " . $updatedTranslationsText;

            // Зберігаємо оновлені дані у файл js/lang.js
            file_put_contents('js/lang.js', $updatedJsContent);

            echo "Translations saved successfully.<br>";
            echo "<br><br> <button><a href='index.html'>RETURN TO THE SITE</a></button> <br><br>
                    <button><a href='text.php'>BACK TO EDIT</a></button>";
        } else {
            echo "Error loading language data.<br>";
            echo "<br><br> <button><a href='index.html'>RETURN TO THE SITE</a></button> <br><br>
                    <button><a href='text.php'>BACK TO EDIT</a></button>";
        }
    } else {
        echo "Data for translations not received.<br>";
        echo "<br><br> <button><a href='index.html'>RETURN TO THE SITE</a></button> <br><br>
                    <button><a href='text.php'>BACK TO EDIT</a></button>";
    }
} else {
    echo "Invalid request.<br>";
    echo "<br><br> <button><a href='index.html'>RETURN TO THE SITE</a></button> <br><br>
                    <button><a href='text.php'>BACK TO EDIT</a></button>";
}
?>