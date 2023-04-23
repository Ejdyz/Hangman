# Otázka 18 – Šibenice

- Pracujete na localhostu, veškeré soubory s kódy i obrázky, i sql soubor s příkazy (pokud využíváte)
uložte do jednoho adresáře. Po skončení práce tuto složku zkopírujte na plochu, složka bude mít
vaše příjmení jako název!

## Popis

- Vytvořte kompletní webovou stránku. 
- Všechny stránky budou mít stejnou strukturu – hlavička, tělo,
patička. 
- Je vyžadována grafická úprava webu (máte k dispozici Inkscape).

## Komponenty aplikace

### Přihlášení a registrace

- Při registraci zadává uživatel pole Heslo, Kontrola hesla, Email. Všechna pole jsou povinná. 
- Nelze provést registraci bez vyplněných polí. 
- Email musí být v databázi unikátní. Validace probíhá na klientu před odesláním na server.

- Přihlášení probíhá pomocí emailu a hesla. Po přihlášení bude uživatel přesměrován na hlavní stránku.

- Hru lze hrát i bez přihlášení, ale neukládají se statistiky.

### Hra

 - Vytvořte databázi, která bude obsahovat hádaná slova (min 10 slov). Na začátku hry se náhodně
vybere jedno slovo z databáze. Dle slova se vygenerují podtržítka (pro každé písmeno jedno). Zároveň
se pro vybrané slovo zobrazí počet úspěšných a neúspěšných her. Hráč má k dispozici panel
s abecedou, kde vybírá písmenka do hádaného slova. Pokud hráč zvolí písmeno, které ve slově je,
doplní se na všechny pozice, kam patří (místo podtržítek). Na písmeno nepůjde znovu kliknout. Pokud
písmeno ve slově není, přikreslí se kus panáčka na šibenici. Hra končí uhodnutím slova nebo
dokreslením panáčka. Po dokončení hry se ukáže tlačítko pro spuštění nové hry a tlačítko pro přidání
nových slov do databáze.

### Správa slov

- Při přidávání slov dbejte na to, aby slova nebyla v databázi vícekrát.

### Statistiky

- Každý hráč si může pro svůj účet zobrazit procentuální úspěšnost hádání slov a konkrétní hodnoty úspěšných a neúspěšných her

## Rozpis práce

- home page -Ejdy

- Register a login backend  -Ejdy

- ~~Databaze  -Vláďa --user --slova --tabulka zaznamu  | user | win/loose | word |~~

- fix sibenice  -Ejdy

- ~~api pro sibenici  -Vláďa --dotazani na slovo --odesilani zaznamu~~

- stranka s user statistikama  -Vláďa

- ~~admin stranka pro pridavani slov  -Vláďa~~
