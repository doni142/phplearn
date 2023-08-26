<?php
namespace App\Commands;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

use App\AppSettings;

#[AsCommand(name: 'generate-admindb')]
class SecondCommand extends Command {

    // Csak itt, más kódok nem tudják használni. PROTECTED FUNCTION 
    protected function configure() {
        $this->addArgument('name', InputArgument::REQUIRED);
        $this->addArgument('species', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        /** @var \PDO $connection */
        $connection = $this->connectDb();

        // Itt a kiiratás (INSERT) SQL-be. Relácíós db-be írsz be
        $sql = 'INSERT INTO pets(name, species) VALUES(:name, :species)';

        // Connection-t preparáljuk sql változóval.
        $statement = $connection->prepare($sql);

        // Adatunkhoz hozzá vesszük a FV paramétereit.
        $data = $this->getOrAskKutyaDataFromInput($input, $output);

        // Lefutattja az SQL-t a megadott paraméterekkel. 
        $statement->execute([
            ':name' => $data['name'],
            ':species' => $data['species'],
        ]);
        //
        $pet_id = $connection->lastInsertId();

        // 1 vagy több karakter kimenete.
        echo "Last id: $pet_id" . PHP_EOL;

        // $data = json_decode(file_get_contents("data.json"));
        //$data[] = $this->getOrAskKutyaDataFromInput($input, $output);
            //'name' => $name, //$input->getArgument('species'),
            //'species' =>$species,     //$input->getArgument('species'),];
        //file_put_contents('data.json', json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

        // Térjen vissza Command sikeresen.
        return Command::SUCCESS;
    }
 
    private function getOrAskKutyaDataFromInput(InputInterface $input, OutputInterface $output) {
        $kutya = [
            //$output->writeln($input->getArgument('name'))
            'name' => (string)$input->getArgument('name'),
            'species' => (string) $input->getArgument('species'),
        ];
        
        /** @var QuestionHelper */
        $helper = $this->getHelper('question'); 

        // Ha az 'üres string' megegyezik a kutya lista 'name'-vel, akkor ->
        if('' === $kutya['name']) {
            // -> question új question kérni fog egy nevet. 
            $question = new Question('Please type a name: ');
            // kutya lista 'name' rész = azzal amit beírt. 
            $kutya['name'] = $helper->ask($input, $output, $question);
        }

        if('' === $kutya['species']) {
            $question = new Question('Please type a species: ');
            $kutya['species'] = $helper->ask($input, $output, $question);
        }
        return $kutya;
    }

    /**
     * Provides a connection to the database.
     * Terjen vissza PDO vagy semmi
     * @return \PDO?null
     * 
     */
    private function connectDb(): \PDO {
        try {
            $serverName = AppSettings::servername;
            $userName = AppSettings::username;
            $password = AppSettings::password;
            $db = AppSettings::db_name;

            $conn = new \PDO("mysql:host=$serverName; dbname=$db", $userName, $password);

            // Set the PDO error mode to exception.
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully to the $db database." . PHP_EOL; 
            return $conn;
        } catch(\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return NULL;
    }
}
// Ne json, hanem adatbázisba is irja ki sql-ben.
// Szomszéd weblapja.
// Css framework bootstrap, tailwind css, utána nézni ezekben gondolkodni, nem ronda oldalak.
// Mvc!! ralavell, symphony, cake php.