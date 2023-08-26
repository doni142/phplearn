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

# [AsCommand(name: 'generate-admin')]
class FirstCommand extends Command {

    protected function configure(){
        $this->addArgument('name', InputArgument::REQUIRED);
        $this->addArgument('species', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $data = json_decode(file_get_contents("data.json"));
        $data[] = $this->getOrAskDogDataFromInput($input, $output);

            //'name' => $name, //$input->getArgument('species'),
            //'species' =>$species,     //$input->getArgument('species'),];
        file_put_contents('data.json', json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        // file_put_contents('adatbazis.sql', sql_injection_subst());
        return Command::SUCCESS;
    }
 
    private function getOrAskDogDataFromInput(InputInterface $input, OutputInterface $output) {
        $dog = [
            //$output->writeln($input->getArgument('name'))
            'name' => (string)$input->getArgument('name'),
            'species' => (string) $input->getArgument('species'),
        ];
        
       /** @var QuestionHelper */
        $helper = $this->getHelper('question'); 

        if('' === $dog['name']) {
            $question = new Question('Please type a name: ');
            $dog['name'] = $helper->ask($input, $output, $question);
        }

        if('' === $dog['species']) {
            $question = new Question('Please type a species: ');
            $dog['species'] = $helper->ask($input, $output, $question);
        }
        return $dog;
    }
}
// ne json, hanem adatbázisba is irja ki sql 
// Szomszéd weblapja
// css framework bootstrap, tailwind css, utána nézni ezekben gondolkodni, nem ronda oldalak
// mvc!! laravell, symphony, cake php
