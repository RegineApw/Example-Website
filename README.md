# Treehouse-Website

Link zur Website (Startseite):
http://page1.42web.io/Projekte/Baumhaus/index.php

[Alle Bilder sind kostenlose Stockfotos von unsplash.com o.Ä oder KI-generiert]


Diese Website habe ich zu Übungszwecken erstellt, geschrieben in Brackets unter Verwendung verschiedener Bootstrap Module.
Es handelt sich um die Website eines fiktiven "Baumhaushotel".

Auf der Website wird das Konzept, die verschiedenen Unterkunftstypen sowie regelmäßige Events vorgestellt, 
weiterhin ist es möglich Unterkünfte zu buchen, eine vorhandene Buchung einzusehen,
diese zu modifizieren oder zu löschen.


Funktionalität:

1. Startseite (index.php)

Die Startseite verfügt über eine Navigationsleiste, über die man auf die weiteren Seiten Baumhäuser, 
Buchungsvervaltung; Events oder zurück auf die Home seite gelangt.
Der Reiter Kontakt ist auf den Footer der Startseite verlinkt.

Weietrhin ist eine Slideshow aus drei Titelbildern zu sehen, die wechselweise ineinander übergehen.
Darunter wird mit einem teaser, Bildern und etwas text das Konzept des "Baumhaushotels" vorgestellt.
Über den Button "Unterkünfte ansehen" wird man weitergeleitet zum Seite "Baumhäuser" bzw. "Ueberblick.php"

2. Baumhäuser ("Ueberblick.php")

Unter der Navigationsleiste ist ein Bootstrap Carousel mit 4 Elementen zu sehen. Jedes repräsentiert 
eine Baumhaus-Kategorie und bewegt sich hin und her wenn man mit der Maus darüberfährt.
Die 4 Kategorien sind: Baumhaus für 2 Personen, Deluxe Baumhaus bis 2 oder bis 4 Pers., 
Familienbaumhaus bis 4 oder bis 6 Pers., Bungalow bis 4 oder bis 6 Pers.
Bei Klick auf den Button "mehr erfahren" einer Kategorie gelangt man weiter unten auf die Seite, 
zu der Stelle an der die Kategorie ausführlicher beschrieben ist.

Die ausführlichere Beschreibung jeder kategorie besteht aus 
einigen Infos (Ausstattungsmerkmale + Preis) auf der linken Seite, und einer Bilder-Slideshow auf der rechten Seite.
Darunter befinden sich jeweils zwei Buttons, einmal "Zur Buchung" und einmal ein Pfeil nach oben. 
Über den pfeil gelangt man wieder zum Beginn der Baumhaus-Überblicks-Seite.
Bei Klick auf "Zur Buchung" öffnet sich ein kleines Fenster mit dem Titel "Deine Buchungsanfrage" (Bootstrap Modal).
Hier kann man eine gewünschte Unterkuinft auswählen, seine Reisedaten, Kontaktinformationen 
und Adresse angeben, sowie einen Text eingeben und daraufhin über den Button "Verfügbarkeit prüfen" 
zum nächsten Schritt gelangen.
Über den Button "Abbrechen" wird das Modal wieder geschlossen.
Der Benutzer bekommt an dieser stelle einen entsprechenden Hinweis, wenn er einen der folgenden Fehler begangen hat:
- zu viele Personen für die gewählte Kategorie angegeben hat
- An-/ Abreisedaten angegeben hat die in der Vergangenheit liegen
- Ein Abreisedatum angegeben hat das vor der Anreise liegt
- ein erforderliches Feld nicht ausgefüllt hat

Bei Klick auf "Verfügbarkeit prüfen" wird die Verfügbarkeit der gewählten Unterkunft in der verknüpften Datenbank geprüft.
Hintergrund: von jeder Kategorie existieren 4 Unterkünfte, wenn zum gewählten Zeitraum bereits 4 Unterkünfte der selben
Kategorie in der Datenbank enthalten sind, kann nicht mehr gebucht werden.

je nach dem Resultat der Prüfung:
 A -> gewünschte Unterkunfts-Kategorie für das angegebene datum nicht mehr verfügbar -> 
Nutzer wird auf die Seite ablehnung.php weitergeleitet, aif der ihm mitgeteilt wird, 
dass die Unterkunft leider nicht méhr verfügbar ist. Über die Navigationsleiste kann er zurück zur Übersichts-Seite navigieren.

B -> gewünschte Unterkunfts-Kategorie für das angegebene Datum ist verfügbar ->
Das große Modal wird durch ein kleines namens "Kapazitäts-Check" ersetzt,
dass den Nutzer  darüber informiert, dass die gewählte Unterkunft noch verfügbar ist. Klick auf den Button "Zurück" 
schließt das kleine Modal und nichts weiter passiert.
Klick auf  "Verbindlich Buchen" löst folgendes aus:
- Die vom Nutzer eingegebenen Daten werden in die Datenbank als neuer Eintrag übernommen. 
- Zusätzlich wird eine Buchungsnummer generiert und eine noch verfügbare Unterkunftsnummer ermittelt (Bsp. A3 wäre Haus drei der Kategorie A)
- Der Nutzer wird auf die Seite Buchungsbestaetigung.php weitergeleitet, auf der er die Details seiner Buchung, Preis und die Buchungsnummer 
noch einmal zusammengefasst sieht.
Außerdem wird er darüber informiert, dass eine Änderung der Buchung (Stornierung oder Datenänderung) nur 
bis 14 Tage vor bisherigem Buchungsdatum möglich ist.


3. Buchungsverwaltung (Buchungsverwaltung.php)

AUf der Seite Buchungsverwaltung.php gibt es vor einem Baumwipfel-Hintergrund zwei Input-Felder, in 
die der Nutzer die E-Mail Adresse und Buchungsnummer die einer bereits getätigten Buchung zugehören 
eingeben kann. Mit Klick auf den Button "anmelden" wird der Nutzer weitergeleitet zu "Buchungsverwaltung2.php".
Der Hintergrund bleibt dabei der selbe, doch im Vordergrund wird ihm nun eine tabellarische Übersicht seiner Buchungs-
daten aufgezeigt. Darunter befinden sich drei Buttons 
"Buchung stornieren"
"Reisedaten ändern"
"ausloggen".

-----

Klick auf "Buchung stornieren" ->
Unter den Buttons taucht eine Rückfrage auf, ob wirklich storniert werden soll, sowie zwei Buttons "Ja" und Nein".
Bei Klick auf Nein verschwindet die Frage und die Buttons wieder. 
Bei Klick auf Ja wird geprüft ob der aktuelle Zeitpunkt noch 14 Tage vor dem bisherigen Anreisedatum der Buchung liegt.
- ist die der Fall, wird der Datensatz der buchung aus der datenbank gelöscht 
und auf der Seite taucht ein Satz unter der tabelle mit Buttons auf "Ihre Buchung wurde gelöscht..."
 -ist dies nicht der Fall, taucht ein Satz Auf, der den Nutzer daruaf hinweist dass die Buchung nicht mehr
storniert werden kann.
Die Datenbank wird nicht verändert.

-----

Klick auf "Reisedaten ändern" ->
Es tauchen 2 neue Input Felder "Neue Anreise" und Neue Abreise" auf, sowie ein Button "Daten Prüfen".
Der Nutzer kann also neue Daten eingeben. Mit Klick auf Daten prüfen, wird 
- weitergeleitet auf "Buchungsverwaltung3.php" (was optisch genauso aussieht wie "Buchungsverwaltung2.php")
geprüft ob 
- der aktuelle Zeitpunkt mind. 14 Tage vor bisherigem Anreisedatum liegt
- zu den neu gewählten Daten noch die gewünschte Kategorie verfügbar ist

-> ist die erste Bedingung nicht erfüllt erscheint wieder ein Satz unter den Buttons, der den Nutzer darauf
 hinweist dass die Buchung zum aktuellen Zeitpunkt nicht mehr modifiziert werden kann.
-> ist die zweite Bedingung nicht erfüllt, erscheint ein Satz, der den Nutzer darauf hinweist, dass
zum geänderten zeitpunkt keine Unterkunft mehr verfügbar ist

-> sind beide Bedingungen erfüllt, erscheint ein Satz, der mitteilt dass die Änderung noch möglich ist, sowie ein Button
"Änderung übernehmen".
Mit Klick auf Änderung übernehmen,
- wird in der Datenbank der existiernde Datensatz verändert (Bzw. die Werte Anreise und Abreise und Preis)
- erscheint unten für den Nutzer sichbar ein Satz der bestätigt, dass die Buchung geändert wurde
- ändert sich die für den Nutzer sichtbare Tabelle so, dass die aktuellen Reisedaten und der 
aktualisierte Preis angezeigt wird

-----
 Klick auf "ausloggen" ->
Der Nutzer verlässt den privaten Bereich und wird wieder auf die Startseite geleitet.

4. Events (Events.php)

Die Event Seite zeigt im Vordergund das Bild eines Papyrus, auf dem die wöchentlich stattfindenden Events aufgelistet sind.
Im Hintergrund wird das Video eines lodernden Lagerfeuers automatisch abgespielt.
AUfgrund des Feuers im Hintergrund, ist auch die Farbe der Navigationsleiste
auf dieser Seite anders gewählt als auf den restlichen.
