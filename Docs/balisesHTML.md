# Rappel des Balises HTML

## Tableau des principales balises HTML

Commençons par les principales que l’on rencontre sur le Web :

```html
<html> ... </html>	Encadre l’ensemble du document HTML (contenu visible et invisible).

<head> ... </head>	Contient les informations techniques de la page (titre, encodage, liens, scripts, etc.).

<body> ... </body>	Contient tout le contenu affiché dans le navigateur (textes, images, vidéos…).

<link />	Lie une feuille de style CSS externe à la page.

<meta />	Ajoute des métadonnées (charset, auteur, description, viewport…). 

<script> ... </script>	Intègre du code JavaScript à la page.

<style> ... </style>	Ajoute du code CSS interne à la page.

<title> ... </title>	Définit le titre de la page (visible dans l’onglet du navigateur).

<abbr>	Signale une abréviation, avec un attribut title (infobulle).

<blockquote>	Insère une citation longue mise en forme distinctement.

<q>	Insère une citation courte (entre guillemets automatiquement).

<cite>	Indique la source d’une œuvre, d’un événement ou d’une publication.

<sub>	Texte en indice (ex : formule chimique).

<sup>	Texte en exposant (ex : puissance mathématique).

<h1> ... <h6>	Hiérarchie des titres : <h1> étant le plus important.

<img />	Insère une image avec les attributs src (source) et alt (texte alternatif).

<mark>	Surligne du texte (mise en évidence).

<strong>	Texte important (gras, signification sémantique forte).

<em>	Texte à souligner par l’italique (emphase, accentuation).

<figure>	Encapsule du contenu comme des images, du code, des graphiques.

<figcaption>	Ajoute une légende à une <figure>.

<audio> ... </audio>	Permet d’intégrer un lecteur audio.

<video> ... </video>	Permet d’intégrer un lecteur vidéo.

<source>	Définit les sources pour <audio> ou <video> (formats alternatifs).

<a> ... </a>	Crée un lien hypertexte à l’aide de l’attribut href.

<br />	Effectue un simple saut de ligne (sans nouveau paragraphe).

<p> ... </p>	Définit un paragraphe de texte.

<hr />	Ajoute une ligne horizontale (séparateur visuel).

<address>	Indique les coordonnées de contact d’un auteur ou d’un site.

<del>	Indique un contenu supprimé (souvent barré).

<ins>	Indique un contenu ajouté (souvent souligné).

<dfn>	Balise de définition pour un terme introduit.

<kbd>	Utilisé pour représenter une entrée clavier utilisateur.

<progress>	Affiche une barre de progression (ex. : chargement).

<time>	Indique une date ou une heure (machine-readable).

<pre> ... </pre>	Affiche du texte formaté (code, indentation préservée).
```

## Balises de structuration du texte

Ces balises permettent d’organiser, de mettre en forme et d’enrichir le contenu visible sur une page HTML. Elles servent à structurer des blocs de texte, à insérer des images, des éléments multimédias, ou encore à souligner des portions importantes du contenu.

### Balise Description / Fonction

```html
<abbr>	Indique une abréviation. L’attribut title peut afficher le terme complet au survol.
<blockquote>	Utilisée pour une citation longue, souvent indentée visuellement.
<q>	Pour les citations courtes. Les navigateurs ajoutent automatiquement des guillemets.
<cite>	Utilisée pour indiquer la source d’une œuvre ou d’un auteur (livre, film, article…).
<sub>	Texte affiché en indice (ex : H2O).
<sup>	Texte en exposant (ex : x2).
<h1> ... <h6>	Balises de titre hiérarchisées, du plus important (h1) au moins important (h6).
<img />	Affiche une image. Nécessite l’attribut src (URL) et alt (texte alternatif).
<mark>	Met en évidence une portion de texte avec un surlignage.
<strong>	Texte à forte importance, souvent affiché en gras.
<em>	Texte mis en emphase, affiché en italique. Peut avoir un sens sémantique (voix, accent, etc.).
<figure>	Utilisé pour grouper un média (image, graphique, code) avec sa légende.
<figcaption>	Contient la légende associée à une balise <figure>.
<audio>	Intègre un lecteur audio HTML natif dans la page.
<video>	Permet d’intégrer une vidéo HTML5 avec contrôles.
<source>	Définit une source alternative pour une balise <audio> ou <video>.
<a>	Crée un lien hypertexte vers une URL grâce à l’attribut href.
<br />	Insère un simple retour à la ligne sans créer de nouveau paragraphe.
<p>	Définit un paragraphe. Chaque bloc de texte distinct devrait être dans une balise <p>.
<hr />	Insère une ligne de séparation horizontale. Utilisée comme rupture thématique.
<address>	Indique les coordonnées d’un auteur ou d’un site (adresse email, postale…).
<del>	Marque un texte supprimé. Visuellement barré dans la plupart des navigateurs.
<ins>	Marque un texte ajouté (souvent affiché souligné).
<dfn>	Signale une définition. Peut être stylisée différemment par le navigateur.
<kbd>	Utilisée pour du texte à taper au clavier (ex : raccourcis, commandes terminal).
<progress>	Affiche une barre de progression interactive avec une valeur.
<time>	Spécifie une date, une heure ou une durée lisible par une machine (utile pour les moteurs).
<pre>	Affiche du texte formaté avec espaces, tabulations et sauts de ligne respectés (souvent pour du code).
Balises de listes
Ces balises permettent de créer des listes structurées dans vos pages HTML. Il en existe trois types : les listes non ordonnées (à puces), les listes ordonnées (numérotées), et les listes de définitions (terme + description).
```

### Balise	Description / Fonction

```html
<ul> ... </ul>	Liste non ordonnée (à puces). Chaque élément est défini par une balise <li>.
<ol> ... </ol>	Liste ordonnée (numérotée automatiquement).
<li> ... </li>	Élément d’une liste, utilisé à l’intérieur des balises <ul> ou <ol>.
<dl> ... </dl>	Liste de définitions. Permet de structurer des paires « terme + définition ».
<dt> ... </dt>	Terme défini dans une <dl>.
<dd> ... </dd>	Description ou définition du terme introduit par <dt>.
```

## Balises de tableau

Ces balises permettent de créer des tableaux HTML avec une structure logique en lignes (<tr>) et cellules (<td> pour les données, <th> pour les en-têtes). Utilisées pour présenter des données tabulaires.

Balise	Description / Fonction
<table> ... </table>	Balise principale qui encadre l’ensemble du tableau.
<caption> ... </caption>	Titre du tableau. S’affiche généralement au-dessus du tableau.
<tr> ... </tr>	Définit une ligne du tableau.
<th> ... </th>	Cellule d’en-tête (souvent en gras et centrée).
<td> ... </td>	Cellule de données standard.
<thead> ... </thead>	Encadre l’en-tête du tableau (lignes de titres).
<tbody> ... </tbody>	Encadre le corps principal du tableau (les données).
<tfoot> ... </tfoot>	Encadre le pied de tableau (utilisé pour les totaux, remarques, etc.).
Balises de formulaire
Ces balises permettent de créer des formulaires HTML, par exemple pour un formulaire de contact, d’inscription ou de recherche. Elles sont essentielles pour recueillir des données utilisateurs via des champs de saisie, des listes déroulantes ou des boutons d’envoi.

Balise	Description / Fonction
<form> ... </form>	Encadre tout le formulaire. Utilise les attributs :
method : méthode d’envoi (souvent post ou get)
action : URL de traitement des données (script ou page de destination)
<fieldset> ... </fieldset>	Permet de regrouper plusieurs champs dans une même section logique.
<legend> ... </legend>	Titre ou légende associée à un <fieldset>.
<label> ... </label>	Texte descriptif lié à un champ de formulaire. Peut être associé à un champ via l’attribut for.
<input />	Champ de formulaire à usage unique (texte, bouton radio, case à cocher, bouton, etc.).
Nécessite l’attribut type pour définir la nature du champ :
type="text" : champ texte simple
type="email" : champ pour adresse mail
type="checkbox" : case à cocher
type="radio" : bouton radio
type="submit" : bouton d’envoi
type="password" : champ de mot de passe masqué
<textarea> ... </textarea>	Zone de saisie multiligne, configurable avec rows et cols.
<select> ... </select>	Liste déroulante permettant de choisir une ou plusieurs options.
<option> ... </option>	Élément d’une liste déroulante (valeur affichée ou envoyée).
<optgroup> ... </optgroup>	Permet de regrouper plusieurs options dans une liste déroulante avec une étiquette commune.
Balises sectionnantes
Ces balises permettent de structurer les grandes zones d’un site web. Elles donnent un sens sémantique aux différentes parties de la page, ce qui aide aussi bien les développeurs que les moteurs de recherche à comprendre la hiérarchie du contenu.

Balise	Description / Fonction
<header> ... </header>	Représente l’en-tête d’une page ou d’une section. Contient souvent le logo, le titre, le menu principal.
<nav> ... </nav>	Zone de navigation principale contenant des liens vers d’autres pages ou sections du site.
<footer> ... </footer>	Bas de page ou de section. Contient généralement les mentions légales, informations de contact, copyright, etc.
<section> ... </section>	Représente une section thématique du document, souvent avec un titre (<h2>, etc.).
<article> ... </article>	Bloc autonome et réutilisable de contenu (ex : un article de blog, une fiche produit, une actualité).
<aside> ... </aside>	Contenu complémentaire, souvent sous forme de sidebar (barre latérale), widgets ou encarts.
Balises génériques
Ces balises n’ont pas de signification sémantique particulière. Elles sont utilisées pour organiser et styliser du contenu à l’aide du CSS.
L’une est de type inline (<span>) et l’autre de type block (<div>).

Balise	Description / Fonction
<span> ... </span>	Balise inline sans signification sémantique. Utilisée pour styliser une portion de texte dans un paragraphe.
Ne provoque pas de saut de ligne.
Ne se redimensionne pas avec width ou height.
Respecte les marges gauche/droite mais pas haut/bas.
<div> ... </div>	Balise block générique, souvent utilisée pour regrouper et structurer des blocs de contenu.
Provoque un retour à la ligne automatique.
Accepte les propriétés CSS de width et height.
Respecte toutes les marges (haut, bas, gauche, droite).
Attributs des balises génériques
Les balises génériques comme <div> ou <span> n’ont de réel intérêt que si vous leur associez des attributs. Ces attributs permettent d’identifier, de styliser ou de manipuler les balises avec du CSS ou du JavaScript.

Attribut	Description / Fonction
class	Spécifie une ou plusieurs classes CSS associées à la balise.
Permet de styliser plusieurs éléments avec le même nom de classe.
Peut être utilisée pour cibler des éléments dans une feuille de style ou en JavaScript.
Syntaxe CSS associée : .nomdelaclasse { ... }
id	Attribut unique servant à identifier un élément précis dans la page.
Ne peut apparaître qu’une seule fois par page HTML.
Utile pour créer des ancres, pour appliquer un style CSS spécifique ou pour manipuler l’élément via JavaScript.
Syntaxe CSS associée : #nomdelid { ... }
style	Permet d’appliquer directement du CSS en ligne, dans la balise HTML.
À utiliser uniquement pour des tests ou des styles ponctuels.
Exemple : <div style="color: red;">Texte rouge</div>
À éviter pour des raisons de maintenance : privilégiez les feuilles de style externes.
