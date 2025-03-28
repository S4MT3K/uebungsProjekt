<?php
class User extends Mensch
{
    private ?int $Id = null;
    private ?string $vorname = null;
    private ?string $nachname = null;
    private ?string $augenfarbe = null;
    private ?int $groesse = null;
    private ?string $haarfarbe = null;
    private ?bool $bildungsgutschein = null;
    private ?string $ausbildungsbeginn = null;
    //private static int $instances = 0; //Static bedeutet, dass diese Variable NUR für die KLASSE, nicht aber für das Objekt selbst steht.
                                   //Sie ist also nur INNERHALB der aktuellen Klasse verfügbar bzw. Sichtbar.


    //DEKLARATION (Blaupause, Konstruktionsplan der klasse)
    //public function __construct(string $vorname, string $nachname, bool $bildungsgutschein, string $augenfarbe, int $groesse, string $haarfarbe, string $dna, string $ausbildungsbeginn)
    //{
      //  parent::__construct($augenfarbe, $groesse, $haarfarbe, $dna);
        //eine elternklasse (in diesem Fall Lebewesen) hat einen einen Konstruktor, dieser muss bei Aufrufen des eigenen Konstruktors mit aufgerufen werden
        //die dabei benötigten variablen werden dem aktuellen Konstruktor mit Übergeben
        //$this->vorname = $vorname;
        //$this->nachname = $nachname;
        //$this->bildungsgutschein = $bildungsgutschein;
        //$this->ausbildungsbeginn = $ausbildungsbeginn;
        //User::$instances++;
        //self::$instances++;
    //}

    //SETTER & GETTER SECTION

    public static function getCountOfInstances()
    {
        return self::$instances;
    }

    public function getId() : int
    {
        return $this->Id;
    }

    public function getVorname(): string
    {
        return $this->vorname;
    }
    public function setVorname(string $newVorname)
    {
        $this->vorname = $newVorname;
    }

    public function getNachname(): string
    {
        return $this->nachname;
    }

    public function setNachname(string $newNachname)
    {
        $this->nachname = $newNachname;
    }

    public function getBildungsgutschein(): bool
    {
        return $this->bildungsgutschein;
    }

    public function getAusbildungsbeginn(): string
    {
        return $this->ausbildungsbeginn;
    }

    //CRUD SECTION
    static function createUser(string $vorname, string $nachname, bool $bildungsgutschein, string $augenfarbe, int $groesse, string $haarfarbe, string $dna, string $ausbildungsbeginn) : self
    {
        //$userToCreate = new User($vorname, $nachname, $bildungsgutschein, $ausbildungsbeginn, $augenfarbe, $groesse, $haarfarbe, $dna); //fingerabdruckobjekt ist automatisch im User enthalten (kommt von klasse Mensch)

        //$fingerabdruckObjekt = $userToCreate->getFingerabdruckObject(); //holen des Fingerabdruck-Objektes aus dem user Objekt
        //$fingerabdruck = $fingerabdruckObjekt->getFingerabdruckFromUser(); // anrufen der Methode getFingerabdruckFromUser von Fingerabdruck (class) die aber den Fingerabdruck des Objektes User returnt.
        // Holen der Datenbankverbindung
        $dbconn = DBConn::getConnection(); //Holen unserer DB Connection via static Class Aufruf

        // Name der Tabelle
        $tablename = static::class; // Definiere den Tabellennamen oder übergib ihn als Parameter aus dem Klassennamen

        // Korrekte SQL-Anweisung mit den richtigen Werten
        $statement_create = "INSERT INTO $tablename (vorname, nachname, bildungsgutschein, ausbildungsbeginn, augenfarbe, groesse, haarfarbe, dna) 
                         VALUES (:fname, :lname, :bildungsgutschein, :ausbildungsbeginn, :augenfarbe, :groesse, :haarfarbe, :dna)";
        // Vorbereitung des SQL-Statements
        $request = $dbconn->prepare($statement_create);
        // Bind-Parameter
        $request->bindParam(':fname', $vorname, PDO::PARAM_STR);
        $request->bindParam(':lname', $nachname, PDO::PARAM_STR);
        $request->bindParam(':bildungsgutschein', $bildungsgutschein, PDO::PARAM_BOOL); // Für Boolean
        $request->bindParam(':ausbildungsbeginn', $ausbildungsbeginn, PDO::PARAM_STR); // Als String für DATETIME
        $request->bindParam(':augenfarbe', $augenfarbe, PDO::PARAM_STR);
        $request->bindParam(':groesse', $groesse, PDO::PARAM_INT);
        $request->bindParam(':haarfarbe', $haarfarbe, PDO::PARAM_STR);
        $request->bindParam(':dna', $dna, PDO::PARAM_STR);
        //$request->bindParam(':fingerabdruck', $fingerabdruck, PDO::PARAM_STR);
        // Ausführung des Statements
        $request->execute(); //HIER PASSIERT DER DATENBANKEINTRAG

        //FUNKTIONSHAUSAUFGABE

        return self::findbyID($dbconn->lastInsertId()); // gibt uns nach Datenbankeintrag, das User Objekt zur weiteren be- bzw. Verarbeitung zurück
    }

    public function updateUser($vorname, $nachname, $bildungsgutschein, $ausbildungsbeginn, $augenfarbe, $groesse, $haarfarbe, $dna) : string
    {
        try
        {
            $dbconn = DBConn::getConnection();
            $id = $this->getId();

            $stmnt_update = "UPDATE user 
                  SET vorname = :vorname, 
                      nachname = :nachname, 
                      bildungsgutschein = :bildungsgutschein, 
                      ausbildungsbeginn = :ausbildungsbeginn, 
                      augenfarbe = :augenfarbe, 
                      groesse = :groesse, 
                      haarfarbe = :haarfarbe, 
                      dna = :dna 
                  WHERE id = :id";

            $request = $dbconn->prepare($stmnt_update);
            $request->bindParam(':id', $id, PDO::PARAM_INT);
            $request->bindParam(':vorname', $vorname);
            $request->bindParam(':nachname', $nachname);
            $request->bindParam(':augenfarbe', $augenfarbe);
            $request->bindParam(':haarfarbe', $haarfarbe);
            $request->bindParam(':groesse', $groesse, PDO::PARAM_INT);
            $request->bindParam(':ausbildungsbeginn', $ausbildungsbeginn);
            $request->bindParam(':bildungsgutschein', $bildungsgutschein, PDO::PARAM_BOOL);
            $request->bindParam(':dna', $dna);

            $request->execute();

            if ($request->rowCount() == 1) {
                return "ÄNDERUNG ERFOLGREICH AUSGEFÜHRT";
            }
            else {
                return "Fehler aufgetreten: ";
            }
        }
        catch (PDOException $e)
        {
            return "Fehler aufgetreten: " . $e->getMessage();
        }
    }
}