#!/usr/bin/perl
use FCGI;
my @strings = (
    'Barack Obama threw a whip skid',
    'Barack Obama lent you his lockring wrench',
    'Barack Obama sold you his Campy cranks',
    'Barack Obama wrapped your handlebar tape',
    'Barack Obama rolls double straps',
    'Barack Obama edited your documentary',
    'Barack Obama cleaned your chain',
    'Barack Obama thinks your sideburns are hyphy',
    'Barack Obama thinks your stylist is hot',
    'Barack Obama is the new white belt',
    'Barack Obama taught you how to shave that annoying spot behind your knee',
    'Barack Obama is bigger than MASH',
    'Barack Obama rolled Phil and Aerospoke in 1998',
    'Barack Obama took you to the Helvetica movie',
    'Barack Obama is NJS',
    'Barack Obama is OK calling it art',
    'Barack Obama meant it when he said he loves you',
    'Barack Obama doesn’t give you shit about your asian girlfriend',
    'Barack Obama talked to you in Japanese',
    'Barack Obama submitted your film to the Bicycle Film Festival',
    'Barack Obama drinks Blue Bottle',
    'Barack Obama sponsored your jersey',
    'Barack Obama rocks riser bars',
    'Barack Obama gave you his last Clif Shot when you were bonking',
    'Barack Obama carried you on a double century',
    'Barack Obama always lets you draft',
    'Barack Obama let you get the good DJ slot',
    'Barack Obama gave you Triple-X Vitamin Water',
    'Barack Obama is okay with your vegan phase',
    'Barack Obama is okay with your bicurious phase',
    'Barack Obama lent you his toothbrush',
    'Barack Obama didn’t use the last of the toilet paper',
    'Barack Obama flossed',
    'Barack Obama linked your MP3',
    'Barack Obama remembers the 80s',
    'Barack Obama let you stand under his umbrella',
    'Barack Obama will PayPal you',
    'Barack Obama likes your face',
    'Barack Obama gave you his Nagasawa',
    'Barack Obama took off your brake',
    'Barack Obama gave you an innertube',
    'Barack Obama trackstands on your bar',
    'Barack Obama did a shot of Fernet with you',
    'Barack Obama gave you his extra Justice ticket',
    'Barack Obama pwned you in Guitar Hero',
    'Barack Obama wears skinny jeans',
    'Barack Obama lent you his f/1.4',
    'Barack Obama gave you his old PowerBook',
    'Barack Obama bought you a burrito',
    'Barack Obama aired up your tires',
    'Barack Obama filmed your skid',
    'Barack Obama trued your wheel',
    'Barack Obama brought the beer',
    'Barack Obama covered your rent',
    'Barack Obama traded clothes with you',
    'Barack Obama is your wingman',
    'Barack Obama lent you his handkerchief',
    'Barack Obama autographed your Moleskine',
    'Barack Obama didn’t sleep with your ex-girlfriend',
    'Barack Obama bought you a PBR',
    'Barack Obama bought you a PBR and a shot',
    'Barack Obama let you bring your bicycle inside',
    'Barack Obama remixed your song',
    'Barack Obama wrote lyrics about you',
    'Barack Obama lent you his vocoder',
    'Barack Obama bought you neon Chucks for your birthday',
    'Barack Obama rolled you a cigarette',
    'Barack Obama held your hair back',
    'Barack Obama gave you good advice about girls',
    'Barack Obama gave you good advice about boys',
    'Barack Obama made you breakfast in the morning',
    'Barack Obama wears Marc Jacobs',
    'Barack Obama paid for your cab',
    'Barack Obama let you crash on his sofa',
    'Barack Obama made you a really good electro mixtape',
    'Barack Obama bought you beer when you were 18',
    'Barack Obama was your roommate in Williamsburg',
    'Barack Obama put your art in his gallery',
    'Barack Obama developed your film',
    'Barack Obama held your stencil',
    'Barack Obama was your art school TA',
    'Barack Obama danced with you until 7 am',
    'Barack Obama paid your cover',
    'Barack Obama hooked you up with his guy',
    'Barack Obama listened to you talk for hours about your ex',
    'Barack Obama gifted you the skull bling',
    'Barack Obama gave you the sweetest hat',
    'Barack Obama let you use his discount',
    'Barack Obama made you some hyphy shit',
    'Barack Obama played Daft Punk to the rock kids',
    'Barack Obama makes art with neon',
    'Barack Obama gave you a FFFFOUND invite',
    'Barack Obama put your song on his MySpace',
    'Barack Obama let you play drums in Rock Band',
    'Barack Obama doesn’t rent women',
    'Barack Obama loves your mama',
    'Barack Obama photographed your opening',
    'Barack Obama won the Thriller dance-off',
    'Barack Obama invented the no-hands skid',
    'Barack Obama DJed your party',
    'Barack Obama MCed your party',
    'Barack Obama bartended your party',
    'Barack Obama got her phone number for you',
    'Barack Obama drew your picture',
    'Barack Obama made your party flyer',
    'Barack Obama promoted your electro party',
    'Barack Obama designed your blog',
    'Barack Obama designed your tattoo',
    'Barack Obama flicked your bean',
    'Barack Obama designed the spoke card for your alleycat',
    'Barack Obama won your alleycat',
    'Barack Obama understands how you feel',
    'Barack Obama gets you',
    'Barack Obama let you know when your fly was down',
    'Barack Obama drove you home',
    'Barack Obama has the Galaga high score',
    'Barack Obama liked your homebrew',
    'Barack Obama held onto your Nintendo collection when you were in France',
    'Barack Obama can danse la poutine',
    'Barack Obama gave you his VIP bracelet',
    'Barack Obama made you his +1',
    'Barack Obama tore shit up',
    'Barack Obama knows where the afterparty is',
    'Barack Obama rocks gold Sambas',
    'Barack Obama has pink skulls on his socks',
);
while( FCGI::accept >= 0 ) {
    open FILE, "../html/index.html";
    my $data = join '', <FILE>;
    close FILE;
    my $n = $ENV{QUERY_STRING};
    $n = length($n) ? int($n) : rand @strings;
    $n = rand @strings if( $n < 0 || $n > (@strings - 1));
    print "Content-Type: text/html\r\n";
    if( $ENV{QUERY_STRING} || $ENV{HTTP_COOKIE} =~ m|=canhaz| ) {
        my $str = $strings[ $n ];
        $data =~ s|Barack Obama Is Your New Fixie</a></h1>|$str</a></h1>|;
    } else {
        print "Set-Cookie: canhaz=canhaz\r\n";
    }
    print "\r\n";
    print $data;
}
