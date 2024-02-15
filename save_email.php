<?php
// Verificăm dacă a fost trimis un email prin formular
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    // Preia valoarea email-ului trimis prin POST
    $email = $_POST['email'];

    // Validăm adresa de email (poți adăuga validări suplimentare aici)

    // Conectarea la baza de date
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "moto_newsletter";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Setarea modului de eroare pentru a afișa excepțiile
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Pregătirea interogării SQL pentru inserarea adresei de email în baza de date
        $stmt = $conn->prepare("INSERT INTO emails (email) VALUES (:email)");
        $stmt->bindParam(':email', $email);

        // Executarea interogării
        $stmt->execute();

        echo "Adresa de email a fost adăugată cu succes în baza de date!";
    } catch(PDOException $e) {
        echo "Eroare la adăugarea adresei de email în baza de date: " . $e->getMessage();
    }

    // Închiderea conexiunii
    $conn = null;
} else {
    // Dacă nu s-a trimis un email prin formular, afișăm un mesaj de eroare
    echo "Nu s-a trimis o adresă de email prin formular!";
}
?>
