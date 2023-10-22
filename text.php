<!DOCTYPE html>
<html>

<head>
    <title>Редагувати об'єкт мови</title>
</head>

<body>
    <h1>Редагувати об'єкт мови</h1>
    <form action="save.php" method="post" id="editForm">
        <?php
        // Завантажуємо вміст з файлу langArr.js та перетворюємо його в масив
        $langArr = [];
        $jsContent = file_get_contents('js/lang.js');
        if ($jsContent) {
            // Видаляємо частину змінної JavaScript "const langArr ="
            $jsContent = str_replace("const langArr =", "", $jsContent);
            // Декодуємо JSON-рядок у масив PHP
            $langArr = json_decode($jsContent, true);
        }

        // Створюємо інтерфейс для редагування
        foreach ($langArr as $key => $translations) {
            echo "<h3>$key</h3>";
            foreach ($translations as $language => $translation) {
                echo "<label>$language:</label>";
                // Замінюємо <input> на <p> з атрибутом contenteditable для редагування тексту
                echo "<p contenteditable='true' class='editable' data-key='$key' data-language='$language'>$translation</p><br>";
            }
        }
        ?>
        <input type="submit" value="Save" id="saveButton">
    </form>

    <script>
        // JavaScript для обробки відправки форми
        document.getElementById('editForm').addEventListener('submit', function (event) {
            event.preventDefault();

            // Збираємо відредаговані переклади у JSON-об'єкт
            const editedTranslations = {};

            const editableElements = document.querySelectorAll('.editable');
            editableElements.forEach(function (element) {
                const key = element.getAttribute('data-key');
                const language = element.getAttribute('data-language');
                const translation = element.textContent.trim();
                if (!editedTranslations[key]) {
                    editedTranslations[key] = {};
                }
                editedTranslations[key][language] = translation;
            });

            // Створюємо приховане поле для зберігання JSON-даних
            const translationsInput = document.createElement('input');
            translationsInput.setAttribute('type', 'hidden');
            translationsInput.setAttribute('name', 'translations');
            translationsInput.value = JSON.stringify(editedTranslations);
            this.appendChild(translationsInput);

            // Відправляємо форму
            this.submit();
        });
    </script>
</body>

</html>