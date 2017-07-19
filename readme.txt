=== Horoscop ===
Contributors: vladwtz
Donate link: https://paypal.me/vladutilie/10
Tags: horoscop, zodiac, zodii, widget, piesă
Requires at least: 2.8.5
Tested up to: 4.7.5
Stable tag: 2.5.6
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Probabil cel mai bun modul pentru afișarea horoscopului, pe site.

== Description ==
Horoscop este în acest moment la cea mai stabilă versiune, oferă acum o interfață foarte interactivă și prietenoasă cu utilizatorul. Activarea, plasarea în sidebar și utilizarea lui sunt foarte simple.

Singura cerință pentru ca acest modul să funcționeze, este să existe o versiune de `cURL` instalată pe serverul pe care rulează site-ul.
După activarea modulului, din meniul cu piese (widget-uri), acesta se va poziționa în sidebar-ul dorit și... voilà.

Informațiile sunt preluate de pe siteul [www.acvaria.com](http://www.acvaria.com), sub acordul scris al autorilor (a se studia termenii din horoscope.php), memorate în baza de date și actualizate la intervale scurte de timp.

Dacă îți place ce fac, arată-mi asta printr-o [mică donație](https://paypal.me/vladutilie/10) :) Îți mulțumesc mult!

== Installation ==
1. Se dezarhivează fișierul Horoscop.zip.
2. Folderul dezarhivat se uploadează pe server în locația `wp-content/plugins/`.
3. Se activează modulul din panoul de control.
4. Se accesează meniul `Aspect > Piese` și prin metoda `drag and drop` se plasează piesa `Horoscop` în sidebar-ul dorit.


== Frequently Asked Questions ==

= De ce durează mult activarea modulului? =
Nu-ți face griji! În momentul activării, modulul extrage informațiile necesare pentru zodii de pe site-ul sursă. Sigur nu va dura mai mult de un minut. Depinde de serverul de găzduire și de disponibilitatea resurselor Acvaria.

= De ce în textul zodiei apare „Conținutul acestei zodii nu a fost actualizat corespunzător.”? =
Există două cauze:
* fie resursele Acvaria nu oferă informațiile necesare pentru ca modulul să poată fi actualizat: se întâmplă uneori ca Acvaria să nu aibă conținut pentru anumite zodii din motive necunoscute de mine și astfel modulul nu are ce informații să preia,
* fie serverul de găzduire pe care se află site-ul în care este instalat modulul, nu dispune de funcționalitatea `cURL`: pentru acest lucru luați legătura cu reprezentanții firmei de la care aveți găzduire.

= Alte probleme? =
Te rog contactează autorul pentru asta. Îți va face cinste cu o bere! ;)

== Screenshots ==
1. Se folosește metoda `drag and drop` pentru poziționarea piesei.
2. Se glisează în jos opțiunile piesei și se setează titlul și modul de afișare.
3. Afișarea zodiacului.


== Changelog ==

= 2.5.6 =
* 21/05/2017 | Compatibilitate cu noua versiune de Wordpress.
* S-a eliminat un bug ce încurca meniul cu Piese.
* S-a eliminat un bug ce punea probleme la actualizarea informațiilor ce sunt preluate din surse Acvaria.
* S-a actualizat versiunea bibliotecii Google jQuery.
* S-a explicitat eroarea la afișarea textului pentru zodii, în cazul în care informațiile nu pot fi preluate de la Acvaria.
* S-a testat funcționalitatea cu noua versiune Wordpress 4.0+.
* S-au modificate mici părți de texte și cod (readaptări la standarde de programare).
* S-au optimizat tipurile de date ale câmpurilor din baza de date.
* S-a modificat metoda de actualizare periodică și s-a introdus WP-Cron.

= 2.2.9 =
* 04/09/2014 | Wordpress 4.0 ships today!
* S-au efectuat verificări pentru ca totul să funcționeze la parametri normali pe noua versiune de Wordpress, 4.0.
* S-au schimbat mici părți ce țin de standardul de programare și optimizarea codului.
* Actualizarea informațiilor se face acum și în ziua următoare ultimului update.

= 2.1.8 =
* 30/07/2014 | Un pas mare spre implementarea jQuery.
* S-a renunțat la pop-up și s-a introdus afișarea zodiacului direct în site printr-o metodă de slide prin jQuery.
* A fost elaborată o soluție pentru actualizarea informațiilor, astfel încât să nu se facă cereri la resursele Acvaria de fiecare dată când se dorește citirea zodiacului.
* Pe lângă această metodă, au fost create alte 4 funcții și un tabel pentru baza de date în ceea ce privește buna funcționare și auto actualizare.
* Pentru modul se setează time zone-ul specific regiunii Europa/București.
* A fost modificată descrierea modulului și a altor câteva secțiuni.
* Codul CSS a fost modificat și îmbunătățit.
* Structura codului a fost readaptată la standarde.

= 1.8.3 =
* 04/05/2014 | Probabil ultimul update al modulului - cea mai stabilă versiune.
* A fost introdusă opțiunea de alegere a modului de afișare a zodiilor: matrice de imagini sau listă ordonată cu zodii.
* Au fost traduse lunile anului din limba engleză în limba română.
* Au fost adăugate perioadele din an, pentru fiecare zodie.
* A fost modificat atât design-ul paginii pop-up ce afișează zodiacul cât și structura sa în mică măsură.
* Mici părți de cod au fost adaptate standardelor de programare în PHP.
* A fost limitat riscul apariției uneor erori, în cazul folosirii abuzive a modulului.
* A fost reformatată informația primită de către resursele Acvaria, astfel încât să nu existe caractere inutile ce pot cauza încărcarea îndelungată a paginii pop-up.

= 1.5.8 =
* 01/02/2014 | Primul update din 2014: numai bine în noul an!
* Lista banală cu zodii ce se afișează în sidebar, a fost înlocuită cu imagini sugestive.
* Structura codului a fost revizuită și adaptată standardelor de programare.
* Au fost adăugate informații cu privire la drepturile de autor ale Acvaria(R).
* Au fost schimbate câteva texte din modul și informațiile despre autor.

= 1.4.5 =
* 11/05/2013 | S-a detectat eroarea principală care se tot raporta în fișierul error_log și s-a rezolvat.
* A fost introdus fișierul widget.php care a preluat funcțiile fișierului horoscop.php, devenind fișier de bază al modulului.
* Fișierul horoscop.php a devenit fișier secundar.
* A fost modificată structura codului.
* Funcțiile din clasa `Horoscop` au fost revizuite și îmbunătățite.
* Modulul se poate activa doar cu modulul PHP `allow_url_fopen` funcțional pe serverul de găzduire.
* S-a restricționat accesul direct către modul.
* La dezactivare, se curăță toate informațiile adăugate inițial, de modul, în baza de date.

= 1.0.1 =
* 24/08/2012 | Schimbarea linkului din fereastra pop-up de la citirea zodiacului, de la /wp-content/plugins/horoscop/horoscop.php?zodie=(zodie) la /horoscop/(zodie).

= 1.0.0 =
* August 2012 | Lansare modul.


== Upgrade Notice ==

= 2.5.6 =
20/05/2017 | Compatibilitate cu noul Wordpress 4+, fixarea de bug-uri și modificări de finețe.

= 2.2.9 =
04/09/2014 | Pregătiri pentru Wordpress 4.0. Yuhuuu!

= 2.1.8 =
30/07/2014 | S-a renunțat la afișarea zodiacului în pop-up și s-a trecut la afișarea sa direct în site.

= 1.8.3 =
04/05/2014 | Probabil ultimul update. Aceasta este considerată cea mai stabilă versiune.

= 1.5.8 =
01/02/2014 | Lista horoscopului afișată pe site, a fost înlocuită de o listă cu imagini sugestive pentru zodii.

= 1.4.5 =
11/05/2013 | S-au rezolvat buguri și s-au refăcut funcțiile, toate modificările fiind aduse în favoarea optimizării și flexibilității codului.

= 1.0.1 =
24/08/2012 | Simplificarea și omogenizarea linkului din fereastra pop-up de la citirea zodiacului.

= 1.0.0 =
August 2012 | Lansare modul.


== Despre autor ==
Aproape absolvent al Universității Politehnica Timişoara, la Facultatea de Automatică și Calculatoare, sunt un Capricorn de 23 de ani, implicat activ în mici proiecte și activități din comunitatea Timișoreană.
Îmi plac teatrul, muzica, lectura, bloggingul, programarea, călătoriile și natura. Dacă ai o idee frumoasă la care vrei să lucrăm împreună, dă-mi un semn. Cu drag aștept! :)

Cu siguranță pot fi găsit pe [facebook](https://www.facebook.com/i.vladut), [instagram](https://www.instagram.com/vladut.ilie/), [twitter](https://twitter.com/vladilie94), [google+](https://plus.google.com/+Vl%C4%83du%C5%A3Ilie), [linkedin](https://www.linkedin.com/in/vladilie/) sau [gravatar](https://ro.gravatar.com/vladilie94).