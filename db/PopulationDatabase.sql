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




