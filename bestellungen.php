<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Daten aus dem Formular abrufen
    $name = $_POST["name"];
    $adresse = $_POST["adresse"];
    $email = $_POST["email"];
    $produkt = $_POST["produkt"];
    $preis = $_POST["preis"];

    // Datei, in der die Bestellungen gespeichert werden
    $datei = "bestellungen.csv";

    // CSV-Zeile erstellen
    $eintrag = array($name, $adresse, $email, $produkt, $preis, date("Y-m-d H:i:s"));
    
    // Datei öffnen (falls nicht existiert, wird sie erstellt)
    $fp = fopen($datei, "a");

    // Neue Zeile in die Datei schreiben
    fputcsv($fp, $eintrag);

    // Datei schließen
    fclose($fp);

    // Erfolgsmeldung & Weiterleitung
    echo "<script>alert('Bestellung erfolgreich gespeichert!'); window.location.href='index.html';</script>";
}
?>
