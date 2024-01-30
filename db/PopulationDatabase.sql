INSERT INTO `giocatore`
VALUES ('S_Nova', 'Ginevra', 'Bartolini', '2002-10-21', 'progetto01');

INSERT INTO `giocatore`
VALUES ('Tripp', 'Galileo', 'Foschini', '2002-09-15', 'progetto02');

INSERT INTO `giocatore`
VALUES ('WOC', 'Wizard', 'Of The Coast', '1990-01-01', 'wizardPass');

INSERT INTO mondo(Nome,Ambientazione,Descrizione,Creatore)
VALUES ('Forgotten Realms','Fantasy',"NEL MONDO DI TORIL, tra il mare delle Spade spazzato dal vento a ovest e le misteriose terre di Kara-Tur a est, giace il continente di Faerùn: un luogo ricco di razze e culture di ogni genere, che è dominato dalle terre degli umani, che si tratti di regni, città-stato o alleanze - di comunità rurali meticolosamente curate. Qua e là, tra le terre degli umani, spuntano i vecchi regni dei nani e le enclave nascoste degli elfi, le popolazioni degli gnomi e degli halfling assimilate nelle altre società e altre razze più esotiche. Chi va in cerca di avventura nei Reami ha solo l'imbarazzo della scelta. Le strade che collegano le città e le nazioni spesso attraversano territori infestati da briganti e predoni umanoidi. Ogni foresta, palude o catena montuosa pullula di pericoli, che si tratti di banditi in agguato, orchi e goblinoidi selvaggi o possenti creature come giganti e draghi. Ogni regione è disseminata di rovine e di caverne che si insinuano sottoterra e molti di questi luoghi custodiscono ancora i tesori di tutte le razze viventi (nonché di molte razze scomparse), che restano in attesa di avventurieri abbastanza intrepidi da farsi avanti a rivendicarli.",'WOC');

INSERT INTO campagna(Nome,Sinossi,Creatore,Id_mondo)
VALUES ('Lost Mine of Phandelver','Questa fantastica avventura ha inizio a Neverwinter, accompagnando un gruppo di personaggi dal livello 1 al livello 5, qualora aspirino a trovare la tanto chiacchierata miniera perduta di Phandelver.
Tutto comincia dall’incarico affidato agli avventurieri, dal nano Gundreen Rockseeker il quale attenderà i giocatori nella città di Phandalin. I nostri eroi dovranno passare lungo la Pista di Triboar, si dice che vari banditi e fuorilegge si nascondano in agguato in agguato lungo il sentiero..
Resta a voi scoprire in che modo gli avventurieri riusciranno a portare a termine il loro incarico e quali nemici li attenderanno!','WOC','1');

INSERT into stato
VALUES ('1','Costa della Spada','Vario','Ricco','Fantasy');

INSERT into luogo_d_interesse(Nome,Tipologia,Descrizione,Mondo,Stato)
VALUES ('Neverwinter','Città',"Una città fortificata di umani e mezz'elfi, Neverwinter è un centro di cultura che non ne da sfoggio, un luogo dove la gente è indaffarata ma non avara, un posto affascinante che non è bizzarro. La città è principalmente conosciuta per i prodotti dei suoi abili artigiani: lampade di vetro multicolore, orologi di precisione ad acqua e gioielli stupendi. E' anche famosa per i suoi giardini, riscaldati dalle acque incredibilmente calde del Fiume Neverwinter. D'estate i giardini forniscono ai mercati gran quantità di frutta, mentre d'inverno rallegrano l'atmosfera con i loro fiori.Le meraviglie architettoniche della città sono i suoi tre ponti: il Delfino, la Viverna Alata, e il Drago Addormentato. Ognuno dei ponti è stato lavorato per dargli la forma della creatura da cui prende il nome. Neverwinter e il suo signore, Lord Nasher Alagondar, sono quasi sempre stati alleati con Waterdeep nella lotta contro Luskan e gli orchi. Chiamata anche 'Gioiello del Nord', Neverwinter è anche sede, assieme a città come Waterdeep, dell'Alleanza dei Lord.",'1','Costa della Spada');

INSERT INTO `luogo_d_interesse`(`Nome`, `Tipologia`, `Descrizione`, `Appartiene`, `Mondo`, `Stato`) VALUES ('Strada Alta','Strada','Strada a sud di Neverwinter. Si incrocia con una mulattiera nota come la Pista Triboar','1','1','Costa della Spada');

INSERT INTO `sessione`(`Id_campagna`, `Data_Sessione`, `Riassunto`) 
VALUES ('1','2024/01/01',"È il secondo giorno della seconda decade del Tempo dei Fiori dell’Anno Del Mezz’uomo sorridente (12 Kythorn 1481 CV) i grossi sconvolgimenti del mondo sono una piccola eco nelle vicende quotidiane dei reami dimenticati; la gente, mangia, dorme e si innamora come prima, insediamenti e città risorgono, tant’è vero che anche i commerci sembrano essere ripresi come nulla fosse. Infatti nella città di Neverwinter un nano di nome Gundren Rockseeker ha chiesto ad un gruppo di mercenari di portare un carro di rifornimenti allo spartano insediamento noto come Phandalin ad un paio di giorni di viaggio verso sud-est dalla città. Gundren sembra chiaramente emozionato (forse addirittura eccitato) ma nonostante la curiosità del gruppo resta reticente sulle sue ragioni del viaggio, vi dice solo, nel suo tono burbero, che lui e i suoi fratelli hanno trovato 'qualcosa di grosso', e vi informa che vi avrebbe pagato dieci monete d'oro a testa per scortare i suoi rifornimenti all’Emporio di Barthen, un piccolo magazzino commerciale a Phandalin. Poi, senza aggiungere altro, vi è sfilato di fronte a dorso del suo cavallo, insieme a quello che all'apparenza sembra un guerriero di nome Sildar Hallwinter, affermando che aveva bisogno di arrivare presto a 'prendersi cura dei suoi affari'. Oltre all’oro ognuno ha le proprie ragioni per dirigersi a Phandalin e l'offerta del nano si è rivelata quantomai opportuna. Dopo due giorni su di un piccolo carro merci sulla Strada Alta a sud di Neverwinter ed una svolta sulla mulattiera nota come la Pista Triboar il gruppo, dietro una curva, trova due cavalli morti stesi al suolo. Ognuno di essi sembra avere diverse frecce dal piumaggio nero conficcate nel corpo. Il bosco in questo punto preme contro il sentiero, che è delimitato da scarpate ripide e folti arbusti su entrambi i lati. Un gruppo di goblin all'improvviso fuorisce dalla foresta aggredendo il carro. Il gruppo ha la meglio dei mostriciattoli, poi osservando il campo scopre che i cavalli sono quelli del loro datore di lavoro e dell'umano che con lui viaggiava. Dopo un breve riposo il mago scopre un sentiero battuto dai goblin che si allontana dalla pista. Il gruppo decide di riportare il carico a Phandalin.");

INSERT INTO `scena` VALUES ('1','2024/01/01','Combattimento contro i goblin','I personaggi combattono contri i goblin. Se i personaggi sconfiggono i goblin e cercano del bottino possono trovare degli anelli e delle gemme preziose. Se decidono di non combattare i goblin si mostreranno bellicosi e inizieranno comunque a colpirli','2');

INSERT INTO `specie`(`Nome`, `Descrizione`, `Creatore`) VALUES ('Human','La razza degli umani è la più versatile e flessibile tra quelle comuni. Sono rinomati per la loro ambizione e diversità per usi, gusti e principi ma anche nell’aspetto, infatti non esiste un umano tipico. L’origine dell’umanità è sempre stata sconosciuta. Gli umani non hanno un mito della creazione come altre razze, tuttavia secondo alcuni calcoli, sono certamente la razza più giovane delle razze comuni. Sebbene gli esseri umani fossero effettivamente nativi del continente Toril nel Faerûn, sono stati trovati anche su altri mondi. Gli esseri umani hanno avuto un innegabile successo in fatto di dominio. Anche se non sia l’unica razza dominante su Toril, gli umani sono stati gli ultimi ad ottenerene il dominio. Nonostante questa forza, o forse proprio a causa di essa, l’umanità era è razza eternamente fratturata e divisa, suddivisa in diversi gruppi etnici. Si credeva che ciò fosse in parte dovuto al fatto che l’umanità, a differenza della maggior parte delle altre razze, non emergeva nel suo insieme ma piuttosto in più luoghi e gruppi contemporaneamente, risultando così nella sua diversità.','WOC');

INSERT INTO `personaggio`(`Nome`, `Allineamento`, `Taglia`, `CA`, `PercezionePassiva`, `PB`, `PF`, `Descrizione`) VALUES ('William DeFoe','LB','Media','18','10','2','25','Un tipo veramente figo che combatte con chiunque incontra just for fun.');

INSERT INTO `personaggio`(`Nome`, `Allineamento`, `Taglia`, `CA`, `PercezionePassiva`, `PB`, `PF`, `Descrizione`) VALUES ('Drago rosso adulto','CM','Mastodontico','22','12','[value-7]','546','I draghi rossi, i più avidi dei draghi puri, non pensano ad altro che ingrandire il loro tesoro. Sono straordinariamente vanitosi, anche per i parametri dei draghi, e la loro arroganza e ben visibile nel portamento superbo e nel disprezzo che dimostrano verso le altre creature.');

INSERT INTO `classe`(`Nome`, `Descrizione`, `Creatore`) VALUES ('Barbaro',"Un umano selvaggio, alto e possente, avanza a grandi passi in una tormenta di neve, avvolto in una pelliccia e armato di ascia. Si concede una risata quando si scaglia contro il gigante del gelo che ha osato cacciare di frodo gli alci della sua tribù.

Un mezzorco lancia un ringhio all'indirizzo dell'ultimo sfidante che ha messo in discussione la sua autorità sulla tribù, pronto a spezzargli il collo a mani nude come ha già fatto con gli ultimi sei rivali.

Con la bava alla bocca, un nano schianta il suo elmo sul volto del drow che lo ha assalito, poi si volta di scatto per piantare il suo gomito corazzato nello stomaco di un altro.

Questi barbari, per quanto diversi tra loro, sono tutti definiti dalla loro ira: una furia irrazionale, incontrollata e insaziabile. La loro collera è ben più di una semplice emozione, è la ferocia di un predatore messo all'angolo, l'assalto implacabile di una tempesta, il tumulto ribollente del mare.
Per alcuni, questa ira sgorga da una comunione con un indomabile spirito animale. Altri attingono alle riserve sterminate di collera di un mondo gravato dal dolore. Per ogni barbaro, l'ira è un potere che alimenta non solo la frenesia della lotta, ma anche i suoi riflessi e la sua resilienza, permettendogli di compiere imprese di forza prodigiose.",'WOC');

INSERT INTO `vocazione`(`IDPersonaggio`, `Classe`, `Livello`) VALUES ('1','Barbaro','1');

INSERT INTO `specializza`(`Nome_SottoClasse`, `Classe`, `IDPersonaggio`) VALUES ('Cammino del Berserker','Barbaro','1');

INSERT INTO `pg`(`IDPersonaggio`, `Livello`, `Creatore`, `IdSpecie`) VALUES ('1','1','WOC','1');

INSERT INTO `eroe`(`IDPersonaggio`, `Id_campagna`) VALUES ('1','1');

INSERT INTO `mostro`(`IDPersonaggio`, `GS`, `Creatore`) VALUES ('2','24','WOC');

INSERT INTO `ubicazione`(`IDPersonaggio`, `Id_luogo_d_interesse`) VALUES ('2','1');

INSERT INTO `png`(`Nome`, `Cognome`, `Eta`, `Descrizione`, `Id_luogo_d_interesse`) VALUES ('Nahala','NessunLuogo','23','Nahala è un tiefling che lavora come acrobata per un gruppo di circensi. Se ci sono dei soldi in gioco, vi conviene controllare le vostre tasche.','1');

INSERT INTO `oggetto`(`Nome`, `Costo`, `Peso`, `Descrizione`, `Categoria`, `Rarita`, `Creatore`) VALUES ('Torcia','1','0.5',"Un pezzo di legno con della stoffa impregnata di sostanze infiammabili. Con un acciarino è possibile incendiare l'estremità per fare luce o danno.","Equipaggiamento d'avventura",'Comune','WOC');

INSERT INTO `oggetto`(`Nome`, `Costo`, `Peso`, `Descrizione`, `Categoria`, `Rarita`, `Creatore`) VALUES ('Armatura Imbottita','500','4',"Un'armatura imbottita è costituita da vari strati trapuntati di stoffa e imbottitura.",'Armatura Leggera','Comune','WOC');

INSERT INTO `oggetto`(`Nome`, `Costo`, `Peso`, `Descrizione`, `Categoria`, `Rarita`, `Creatore`) VALUES ('Frusta','200','1.5','Bacchetta piuttosto lunga e flessibile, alla cui estremità è fissata una cordicella che termina con uno sverzino.','Arma da mischia da guerra','Comune','WOC');

INSERT INTO `armatura`(`Id_oggetto`, `Classe_armatura`) VALUES ('2','11');

INSERT INTO `proprieta__armi`(`Nome`, `Effetto`) VALUES ('Accurata',"Quando un personaggio effettua un attacco con un'arma accurata, può scegliere se usare il modificatore di Forza o di Destrezza per il tiro per colpire e il tiro per i danni. Deve usare lo stesso modificatore per entrambi i tiri.");

INSERT INTO `caratteristica`(`Proprieta`, `Id_oggetto`) VALUES ('Accurata','3');

INSERT INTO `tipo_di_danno`(`Nome`, `Descrizione`) VALUES ('Tagliente','Il danno tagliente è un tipo di danno causato dalle armi che tagliano e affettano i bersagli. Armi come spade, asce e artigli infliggono danni taglienti. Alcune creature sono vulnerabili o resistenti ai danni taglienti. Può anche aggirare alcuni armatura e scudi e può causare sanguinamento o altre lesioni.');

INSERT INTO `tipologia`(`Id_oggetto`, `Tipo_di_danno`, `Danno`) VALUES ('3','Tagliente','1d4');

INSERT INTO `inventario`(`Id_oggetto`, `IDPersonaggio`) VALUES ('3','1');

INSERT INTO `tratti`(`Nome`, `Descrizione`, `Creatore`) VALUES ('Competenza armi guerra','Sei in grado di combattere con tutte le armi da guerra','WOC');

INSERT INTO `competenza_oggetto`(`Id_oggetto`, `IDTratto`) VALUES ('3','1',);

INSERT INTO `dote`(`Nome`, `Tipologia`, `Descrizione`, `Creatore`) VALUES ('Velocità terreno','Velocità','La velocità sul terreno è di 9 metri','WOC');

INSERT INTO `dotazione`(`IDTratto`, `Dote`, `Metri`) VALUES ('2','Velocità terreno','9m');

INSERT INTO `tratti`(`Nome`, `Descrizione`, `Creatore`) VALUES ('Velocità terreno 9m','La velocità sul terreno è di 9m','WOC');




