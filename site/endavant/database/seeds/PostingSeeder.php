<?php

use App\tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Model::unguard();

        DB::table('postingtypes')->truncate();
        DB::table('postings')->truncate();

        $website = tag::where('tag', 'website')->first();
        $game = tag::where('tag', 'game')->first();
        $grafisch_werk = tag::where('tag', 'grafisch werk')->first();
        $UX = tag::where('tag', 'UX')->first();
        $app = tag::where('tag', 'app')->first();
        $plugin = tag::where('tag', 'plugin')->first();
        $poster = tag::where('tag', 'poster')->first();
        $flyer = tag::where('tag', 'flyer')->first();
        $animatiefilmpje = tag::where('tag', 'animatiefilmpje')->first();
        $visualisatie = tag::where('tag', '3D visualisatie')->first();


        $type1 = new \App\postingtype();
        $type1->type = 'Studentenjob';
        $type1->save();

        $type2 = new \App\postingtype();
        $type2->type = 'Stage';
        $type2->save();

        $pos1 = new \App\posting();
        $pos1->title = 'Website voor een Kapper';
        $pos1->description = '<p>De site die ik wil zou moeten bestaan uit een voorpagina, een pagina met informatie over mijn zaak en een pagina waar mijn klanten mij kunnen contacteren.</p>
<p>Ik zou ook graag wat foto\'s oop de site zetten of eventueel foto\'s van mijn instagram automatisch tonen op mijn site aangezien ik hier ook wel actief met probeer bezig te zijn.&nbsp;</p>
<p>Verder is het belangrijk dat mijn contactgegevens zeer duidelijk zijn want hier heb ik momenteel wel veel last van. De mensen vinden mijn gegevens nergens. Er zou ook eventueel een systeem in mogen om mijn afspraken te regelen. Dit is niet super dringend&nbsp; want voorlopig werk ik nog zonder afspraak maar ik zou dit wel illen starten.</p>';
        $pos1->reason = '<p>Meer en meer kappers in de buurt van Wilrijk beslissen om hun diensten meer online te gaan verkopen en hier ook een soort van webshop aan koppelen. Dit was voor mij het teken dat ik niet meer kon achterblijven.</p>';
        $pos1->company_id = 2;
        $pos1->postingtype_id = 1;
        $pos1->save();
        $pos1->tags()->attach($website->id);

        $pos2 = new \App\posting();
        $pos2->title = 'Raamstickers voor mijn winkel';
        $pos2->description = '<p>Ieder&nbsp; jaar lanceren ik en mijn man met wie ik een bakkerij heb ons speciaal halloweenbrood. Al onze klanten vinden dit geweldig en zeer lekker.</p>
<p>Maar buiten de vaste klanten is er eigenlijk niet veel volk dat van het bestaan hier van af weet.</p>
<p>Ik zou dit graag veranderen door middel van raamstickers:</p>
<p>de afmetingen van mijn raam zijn 2 meter x 4 meter en de sticker zou reelijk strak moeten zijn. Ook de huiskleuren van onze bakkerij zouden hier in terug te vinden moeten zijn. deze zijn zwrt en wit zoals je aan ons logo wel kan zien.</p>';
        $pos2->reason = '<p>Ik zou graag tegen Halloween een actie doen met mijn bakkerij. Wij hebben ieder jaar een speciaal halloweenbrood en ik zou graag dit jaar iets meer doen met de actie.</p>';
        $pos2->company_id = 1;
        $pos2->postingtype_id = 1;
        $pos2->save();
        $pos2->tags()->attach($grafisch_werk->id);

        $pos3 = new \App\posting();
        $pos3->title = 'Webshop voor mijn bakkerij';
        $pos3->description = '<p>De site die ik wil zou moeten bestaan uit een voorpagina, een pagina met informatie over mijn zaak en een pagina waar mijn klanten mij kunnen contacteren.</p>
<p>Ik zou ook graag wat foto\'s oop de site zetten of eventueel foto\'s van mijn instagram automatisch tonen op mijn site aangezien ik hier ook wel actief met probeer bezig te zijn.&nbsp;</p>
<p>Verder is het belangrijk dat mijn contactgegevens zeer duidelijk zijn want hier heb ik momenteel wel veel last van. De mensen vinden mijn gegevens nergens. Er zou ook eventueel een systeem in mogen om mijn afspraken te regelen. Dit is niet super dringend&nbsp; want voorlopig werk ik nog zonder afspraak maar ik zou dit wel illen starten.</p>';
        $pos3->reason = '<p>Ik wil mijn klanten graag een webshop aanbieden waar ze bijvoorbeeld in de drukkere periodes hun bestellingen op voorhand kunnen plaatsen en dan op de dag zelf enkel hun producten moeten afhalen. Dit zou voor mij ook heel wat werk schelen</p>';
        $pos3->company_id = 1;
        $pos3->postingtype_id = 1;
        $pos3->save();
        $pos3->tags()->attach($website->id);

        $pos4 = new \App\posting();
        $pos4->title = 'Vernieuwende flyer en poster voor een kapper';
        $pos4->description = '<p>Voor de flyer zelf heb ik nog niet echt ideetjes en hier laat ik uiteraard jullie verbeelding aan over.&nbsp;</p>
<p>Ik wil niet de standaard 3-panel flyer maar iets leuk iets nieuw. Het hoeft ook niet per se een flyer te zijn maar ook hier heb ik&nbsp; niet veel kennis over. Verder heb ik wel een huisstijl en kleuren waar rekening met gehouden moet worden.</p>';
        $pos4->reason = '<p>Ik heb momenteel vooral oude klanten. Ik zou mij graag ook wat meer richten op jongere klanten en ik heb hier ook speciaal een nieuwe jongere kapper voor aangenomen en zou dit graag op een vernieuwende manier met een flyer brengen</p>';
        $pos4->company_id = 2;
        $pos4->postingtype_id = 1;
        $pos4->save();
        $pos4->tags()->attach($grafisch_werk->id);
        $pos4->tags()->attach($flyer->id);
        $pos4->tags()->attach($poster->id);


        $pos5 = new \App\posting();
        $pos5->title = 'App om brood samen te stellen';
        $pos5->description = '<p>Het concept zit als volgt in elkaar.&nbsp;</p>
<p>Een klant van mij is bijvoorbeeld allergisch voor bepaalde ingredienten of wil iemand verrassen met iets speciaal. Hij of zij kiest een product naar keuze en kaan dan beginnen customizen.&nbsp;</p>
<p>Per ingredient dat wordt toegevoegd wortd er een klein bedrg aan het totaalbedrag toegevoegd en zo wordt er dan een totaal berekend.&nbsp;</p>
<p>Dit klinkt misschien vreemd voor brood maar bijvoorbeeld voor taarten en koffiekoeken voor feestjes zou dit wel vaker gebruikt worden.We zouden onze volledige cateringservice hier zelfs met kunnen uitvoeren.</p>';
        $pos5->reason = '<p>Ik wil graag de bakker van de toekomst worden. Hierdoor kan ik niet blijven stilstaan en ben ik altijd op zoek naar vernieuwing binnen de sector. Ik wil dit concept dan ook graag uitproberen of toch klaar hebben staan voor als de markt er klaar voor is</p>';
        $pos5->company_id = 1;
        $pos5->postingtype_id = 1;
        $pos5->save();
        $pos5->tags()->attach($grafisch_werk->id);
        $pos5->tags()->attach($app->id);
        $pos5->tags()->attach($visualisatie->id);

        $pos6 = new \App\posting();
        $pos6->title = 'Game voor kinderen voor tijdens het knippen';
        $pos6->description = '<p>Veel van mijn klanten komen niet meer met hun kinderen omdat ze zich vervelen, zich misdragen of gewoon schrik hebben van de kapper. Ik ben dan ook hard op zoek gegaan naar een oplossing en kwam hier bij uit.&nbsp;</p>
<p>Ik zou graag een game willen maken waarmee de kindjes zich kunnen bezig houden als de ouders op de stoel zitten. Ik denk hier bijvoorbeeld aan een spel waarbijkinderen het haar van iemand kunnen knippen (eventueel van de ouder zelf via een camera in de spiegel of zo)</p>
<p>&nbsp;</p>
<p>Wat ook een optie kan zijn is dat kindjes via een scherm achter de spiegel beloningen krijgen als ze goed stilzitten of zotte hoeden en brillen kunnen opzetten.</p>';
        $pos6->reason = '<p>Veel van mijn klanten komen niet meer met hun kinderen omdat ze zich vervelen, zich misdragen of gewoon schrik hebben van de kapper. Ik ben dan ook hard op zoek gegaan naar een oplossing en kwam hier bij uit.</p>';
        $pos6->company_id = 2;
        $pos6->postingtype_id = 1;
        $pos6->save();
        $pos6->tags()->attach($game->id);
        $pos6->tags()->attach($visualisatie->id);

        $pos7 = new \App\posting();
        $pos7->title = 'Website voor evenementen';
        $pos7->description = '<p>De site die ik voor ogen heb zou best uitgebreid zijn.&nbsp; Er zouden verschillende evenementen op gepromoot moeten kunnen worden. En dit op verschillende manieren. Sommige evenementen lenen zich nu eenmaal beter tot video en andere tot tekst.</p>
<p>Er zou zeker een soort zoekoptie moeten inzitten waarmee gebruikers evenementen kunnen opzoeken op basis van sector maar ook op basis van locatie.&nbsp;</p>
<p>Ook zou het handig zijn moest ik voor grote evenementen een soort eigen site kunnen genereren uit de hoofdsite.</p>';
        $pos7->reason = '<p>Als evenementenbureau spreekt het voor zich dat ik veel evenementen organiseer. Tot nu deed ik dit vooral voor klanten die zelf de promotie deden. Nu ben ik aan het uitbreiden en wil ik de promotie ook op mij nemen en zo mijn klanten het totaalpakket aanbieden.</p>';
        $pos7->company_id = 3;
        $pos7->postingtype_id = 1;
        $pos7->save();
        $pos7->tags()->attach($website->id);

        $pos8 = new \App\posting();
        $pos8->title = 'Posters en flyers voor evenementen';
        $pos8->description = '<p>Ik zou graag&nbsp; verschillende posters en flyers hebben voor verschillende evenementen in verschillende stijlen uiteraard.</p>
<p>Het zou gaan om volgende evenementen:</p>
<ul>
<li>Een festival in de zomer</li>
<li>Een ledendag voor een magazine</li>
<li>Een indoor festival (hardstyle)</li>
<li>Een netwerkevenement</li>
</ul>';
        $pos8->reason = '<p>Als evenementenbureau spreekt het voor zich dat ik veel evenementen organiseer. Tot nu deed ik dit vooral voor klanten die zelf de promotie deden. Nu ben ik aan het uitbreiden en wil ik de promotie ook op mij nemen en zo mijn klanten het totaalpakket aanbieden.</p>';
        $pos8->company_id = 3;
        $pos8->postingtype_id = 1;
        $pos8->save();
        $pos8->tags()->attach($poster->id);
        $pos8->tags()->attach($flyer->id);
        $pos8->tags()->attach($grafisch_werk->id);

        $pos9 = new \App\posting();
        $pos9->title = 'App voor een festival';
        $pos9->description = '<p>Voor een festival op een locatie tussen de bossen wil ik een meerwaarde maken voor de bezoekers door van het festivalterein een soort spel te maken. Door middel van tips en opdrachten zouden de gebruikers real life easter eggs kunnen vinden verspreid op het terein.</p>
<p>Ook moet het mogelijk zijn om bepaalde opdrachten te filmen en een rating te geven zo zouden de winnaars van elke dag bepaalde upgrades kunnen verdienen om hun festivalervaring extra aangenaam te maken.&nbsp;</p>';
        $pos9->reason = '<p>Voor een klant van, mij organiseer ik een festival. Om een meerwaarde te creeeren voor hem en voor de bezoekers had ik het idee om een app te laten maken voor dit festival.</p>';
        $pos9->company_id = 3;
        $pos9->postingtype_id = 1;
        $pos9->save();
        $pos9->tags()->attach($app->id);
        $pos9->tags()->attach($website->id);

        $pos10 = new \App\posting();
        $pos10->title = '3D  visualisatie van een podium';
        $pos10->description = '<p>De 3D visualisatie van het podium zou zeer goed aangekleed moeten zijn. Er zouden bewegende onderdelen moeten zijn. Vuur moet getoond kunnen orden en ik zou dit liefst ook kunnen combineren met verschillende soorten voetbalstadons en zalen. Ook zouden er wat aanpasbare onderdelen moeten zijn zoals&nbsp; bv kleuren die aangepast worden of lichten .</p>';
        $pos10->reason = '<p>Ik heb binnen 3 maanden een belangrijke meeting met een internationaal bekende band. Ik wil hen overhalen om mij hun tournee te laten organiseren door het podium dat ik inn gedachten heb in 3D voor te stellen </p>';
        $pos10->company_id = 3;
        $pos10->postingtype_id = 1;
        $pos10->save();
        $pos10->tags()->attach($visualisatie->id);

        $pos11 = new \App\posting();
        $pos11->title = 'Verbetering UX van een website';
        $pos11->description = "<p>Ik zou graag eens naar de UX van mijn huidige site laten kijken.</p>
<p>Momenteel is de site redelijk hard verouderd en ik zou hier graag verbeteringen aan laten gebeuren.</p>
<p>dit is de link naar mijn huidige site: <a href='http://www.ditismijnsite.be'>www.ditismijnsite.be</a></p>
<p>&nbsp;</p>";
        $pos11->reason = '<p>Mijn huidige website is al redelijk oud. En een vriend van me zei om deze eens te laten updaten.</p>';
        $pos11->company_id = 1;
        $pos11->postingtype_id = 1;
        $pos11->save();
        $pos11->tags()->attach($UX->id);
        $pos11->tags()->attach($website->id);

        $pos12 = new \App\posting();
        $pos12->title = 'Animatie film evenement';
        $pos12->description = '<p>Een evenement waarop verschillende sprekers komen wil graag tussen elke spreken een soort animatie waarin een cartoon versie van de volgende spreker zich even voor stelt (iets in de aard van de ethias filmpjes maar dan een andere stijl).</p>
<p>Ook de aankondigingen van het evenement die om de week op social media gedropt gaan worden zouden animaties moeten zijn.</p>';
        $pos12->reason = '<p>Als evenementenbureau spreekt het voor zich dat ik veel evenementen organiseer. Tot nu deed ik dit vooral voor klanten die zelf de promotie deden. Nu ben ik aan het uitbreiden en wil ik de promotie ook op mij nemen en zo mijn klanten het totaalpakket aanbieden.</p>';
        $pos12->company_id = 3;
        $pos12->postingtype_id = 1;
        $pos12->save();
        $pos12->tags()->attach($animatiefilmpje->id);

        $pos13 = new \App\posting();
        $pos13->title = 'Plugin voor mijn site';
        $pos13->description = '<p>Ik wil graag een soort plugin voor mijn website die in wordpress is opgebouwd. De bedoeling is dat mijn bestellingen meteen naar een ander programma op mijn computer worden doorgestuurd. Hierdoor krijg ik deze wel te zien en vergeet ik geen bestellingen. Ook zou ik graag een melding krijgen voor elke bestelling die hier binnen komt zodat ik dubbel gewaarschuwd wordt.</p>';
        $pos13->reason = '<p>Ik ben zeer tevreden van mijn webiste maar voorlopig komen de bestellingen in mijn mail en deze zie ik niet altijd. Dit is uiteraard lastig voor mijn en voor de klanten</p>';
        $pos13->company_id = 2;
        $pos13->postingtype_id = 1;
        $pos13->save();
        $pos13->tags()->attach($website->id);
        $pos13->tags()->attach($plugin->id);


    }
}
