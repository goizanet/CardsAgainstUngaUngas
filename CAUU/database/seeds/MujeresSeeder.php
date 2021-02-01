<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MujeresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ////////////////////////////////////////////////////////////
        DB::table('mujeres')->insert([
            'nombre' => 'Lila',
            'apellido' => 'Abu-Lughod',
            'lore_es' => 'Profesora estadounidense de Antropología y Estudios de Género en la Universidad de Columbia en la Ciudad de Nueva York. Especialista en el mundo Árabe, sus siete libros -la mayoría basados en investigación etnográfica- abarcan temas que van desde el sentimiento y la poesía al nacionalismo y los medios de comunicación, desde la política de género a las políticas de la memoria.',
            'lore_eus' => 'Antropologiako eta Genero-ikasketetako irakasle estatubatuarra Columbia Unibertsitatean, New York hirian. Arabiar munduan aditua, zazpi liburuek -ikerketa etnografikoan oinarrituta-, sentimendutik eta poesiatik nazionalismora eta komunikabideetara doazen gaiak hartzen dituzte, genero-politikatik memoriaren politiketara.',
            'lore_en' => 'Lila Abu-Lughod is a Palestinian-American anthropologist. She is the Joseph L. Buttenweiser Professor of Social Science in the Department of Anthropology at Columbia University in New York City. She specializes in ethnographic research in the Arab world, and her seven books cover topics including sentiment and poetry, nationalism and media, gender politics and the politics of memory.',
            'zona_geografica' => 'Norteamericana-Palestina',
            'ambito_id' => 1,
            'continente_id' => 4,
            'fecha_nacimiento' => Carbon::parse('21-10-1952'),
            'fecha_muerte' => null,
        ]);
        DB::table('datos')->insert([
            'mujer_id' => 1,
            'dato' => 'Tiene siete libros',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 1,
            'dato' => 'Profesora en la universidad de Columbia',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 1,
            'dato' => 'Especialista en el mundo árabe',
        ]);

        ////////////////////////////////////////////////////////////
        DB::table('mujeres')->insert([
            'nombre' => 'Ruth',
            'apellido' => 'Benedict',
            'lore_es' => 'Ayudó en la guerra para la lucha contra el racismo, entender a los japoneses.En 1946 fue elegida la primera mujer presidente de la Asociación Antropológica Americana.',
            'lore_eus' => 'Arrazakeriaren aurkako borrokan lagundu zuen, japoniarrak ulertzeko. 1946an, Amerikako Antropologia Elkarteko lehen presidente izendatu zuten.',
            'lore_en' => 'She helped in the fight against racism. In 1946 she was elected as the first woman president of the American Anthropological Association.',
            'zona_geografica' => 'Norteamericana',
            'ambito_id' => 1,
            'continente_id' => 4,
            'fecha_nacimiento' => Carbon::parse('05-6-1887'),
            'fecha_muerte' => Carbon::parse('17-9-1948'),
        ]);
        DB::table('datos')->insert([
            'mujer_id' => 2,
            'dato' => 'Ayudó en la lucha contra el racismo',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 2,
            'dato' => 'Fue elegida la primera mujer presidente de la Asociación Antropológica Americana',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 2,
            'dato' => 'Fue miembro de la Academia Estadounidense de las Artes y las Ciencias',
        ]);

        ////////////////////////////////////////////////////////////
        DB::table('mujeres')->insert([
            'nombre' => 'Janice',
            'apellido' => 'Boddy',
            'lore_es' => 'Antropólogo canadiense, actualmente Profesor de Antropología en la Universidad de Toronto. Boddy se especializa en antropología médica, religión, cuestiones de género y colonialismo en Sudán y Oriente Medio. insta a una contextualización cultural de la mutilación genital femenina en África por parte de quienes desean erradicarla. Se cree que Boddy fue la primera mujer de la Universidad de Toronto Scarborough en ser seleccionada para la Royal Society of Canada.',
            'lore_eus' => 'Kanadako antropologoa, gaur egun Torontoko Unibertsitatean Antropologiako irakaslea. Boddyk antropologia medikoa, erlijioa, generoa eta kolonialismoa espezializatzen ditu Sudanen eta Ekialde Ertainean. Afrikan emakumeen mutilazio genitalaren mutilazio genitalaren testuinguruan kokatu nahi du. Uste da Boddy Toronto Scarboroughen unibertsitateko lehen emakumea izan zela, Royal Society of Canadarako hautatu zuten.',
            'lore_en' => 'Canadian anthropologist, currently Professor of Anthropology at the University of Toronto. Boddy specializes in medical anthropology, religion, gender issues and colonialism in Sudan and the Middle East.urges for a cultural contextualization of female genital mutilation in Africa by those who wish to eradicate it. Boddy is believed to be the first women from the University of Toronto Scarborough to be selected to the Royal Society of Canada. The second woman, Lisa Jeffrey, was elected in 2007',
            'zona_geografica' => 'Norteamérica',
            'ambito_id' => 1,
            'continente_id' => 4,
            'fecha_nacimiento' => Carbon::parse('11-7-1951'),
            'fecha_muerte' => null,
        ]);
        DB::table('datos')->insert([
            'mujer_id' => 3,
            'dato' => 'Es profesora de Antropología en la Universidad de Toront',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 3,
            'dato' => 'Se especializa en antropología médica, religión, cuestiones de género y colonialismo en Sudán y Oriente Medio.',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 3,
            'dato' => 'Fue seleccionada para la Royal Society of Canada',
        ]);

        ////////////////////////////////////////////////////////////
        DB::table('mujeres')->insert([
            'nombre' => 'Matilda',
            'apellido' => 'Coxe Stevenson',
            'lore_es' => 'Pasó 13 años en exploraciones de la región de las Montañas Rocosas. En la década de 1880, los Stevensons "formaron el primer equipo de marido y mujer en antropología". Las contribuciones de Matilda Coxe Stevenson se centraron a menudo en las mujeres y la vida familiar, por lo que "rápidamente se ganó una reputación de científica vigorosa y devota".',
            'lore_eus' => '13 urte igaro zituen Mendi Harritsuen eskualdeko esplorazioetan. 1880eko hamarkadan, Stevensons-ek "lehenengo senar taldea osatu zuten antropologian". Matilda Coxe Stevensonen ekarpenak emakumeengan eta familia-bizitzan zentratu ziren maiz, eta, beraz, "Azkar" zientzilari indartsua eta suntsitua lortu zen.',
            'lore_en' => 'She spent 13 years in explorations of the Rocky Mountain region. In the 1880s, the Stevensons "formed the first husband-wife team in anthropology". Matilda Coxe Stevenson\'s contributions often focused on women and family life, for which she "quickly developed a reputation as a vigorous and devoted scientist".',
            'zona_geografica' => 'Norteamérica',
            'ambito_id' => 1,
            'continente_id' => 4,
            'fecha_nacimiento' => Carbon::parse('12-5-1849'),
            'fecha_muerte' => Carbon::parse('24-6-1915'),
        ]);
        DB::table('datos')->insert([
            'mujer_id' => 4,
            'dato' => 'Junto a su marido, formaron el primer equipo de marido y mujer en antropología.',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 4,
            'dato' => 'A menudo sus investigaciones se centraban en las mujeres y en la vida familiar.',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 4,
            'dato' => 'También escribía bajo el nombre de Tilly E. Stevenson',
        ]);


        ////////////////////////////////////////////////////////////
        DB::table('mujeres')->insert([
            'nombre' => 'Alice',
            'apellido' => 'Cunningham Fletcher',
            'lore_es' => 'En 1882 fue designada como asistente en el área de Etnología del Museo Peabody, y en 1891 recibió la membresía Thaw, creada específicamente para ella. Siempre activa en sociedades profesionales, fue elegida presidenta de la Sociedad Antropológica de Washington y en 1905 como la primera presidente mujer de la Sociedad Norteamericana de Folklore. Ella también se desempeñó como vicepresidente de la Asociación Estadounidense para el Avance de CienciaTrabajando a través de la Asociación Nacional para Mujeres Indias, Fletcher introdujo un sistema que permitía realizar pequeños préstamos a nativos americanos, con el cual podrían comprar tierra y casas. Ella también ayudó a conseguir un préstamo para que Susan La Flesche, una mujer Omaha, pudiera concluir sus estudios en Medicina. Graduándose como la mejor de su clase, La Flesche se convirtió en la primera mujer nativa americana doctora.',
            'lore_eus' => '1882an laguntzaile gisa izendatu zuten Peabody Museoko Etnologia Arloan, eta 1891n Thaw membresia jaso zuen, berarentzat berariaz sortua. Beti aktiboa izan zen elkarte profesionaletan, Washingtongo Antropologia Elkarteko lehendakari hautatu zuten eta 1905ean Iparramerikako Folklore Elkarteko lehen emakumezko presidentea izan zen. Bera ere Estatu Batuetako Erakundeko presidenteorde izan zen, Emakume Indietako Elkarte Nazionalaren bidez Zientziako Aurrerapenerako Estatu Batuetako Elkarteko presidenteorde gisa, Fletcherrek Ameriketako Estatu Batuei mailegu txikiak egiteko sistema bat sartu zuen, eta horrekin lurra eta etxeak erosi ahal izango lirateke. Susan La Flesche emakume batek Medikuntzako ikasketak amaitu ahal izateko mailegu bat lortzen lagundu zuen. Eskolako onena bezala graduatu zen La Flesche, eta Amerikako lehen emakume natibo bihurtu zen.',
            'lore_en' => 'In 1882 she was appointed as an assistant of the Ethnology area in the Peabody Museum and, in 1891 she received the Thaq membership, which was specifically created for her. She was always active in professional societies, she was an elected president of the Anthropological Society of Washington and in 1905 as the first woman president of the American Folklore Society. She also performed as vice president of the American Association for the Advancement of Science working through the National Association for Indian Women. Fletcher introduced a system that allowed making smalls loans for american natives, which they could use to buy lands and houses. She also helped obtaining a loan for Susan La Flesche, who was an Omaha woman, for her to conclude her studies in medicine. She graduated as the best of her class. La Flesche became the first american native woman doctor. ',
            'zona_geografica' => 'Norteamérica',
            'ambito_id' => 1,
            'continente_id' => 4,
            'fecha_nacimiento' => Carbon::parse('15-3-1838'),
            'fecha_muerte' => Carbon::parse('6-4-1923'),

        ]);
        DB::table('datos')->insert([
            'mujer_id' => 5,
            'dato' => 'Fue asistente en el áre de Etnología del Museo Peabody',
        ]);

        DB::table('datos')->insert([
                'mujer_id' => 5,
                'dato' => 'Recibió la membresía Thaw, la cual fue creada especifícamente para ella',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 5,
            'dato' => 'Fue la primera presidente mujer de la Sociedad Norteamericana de Folklore',
        ]);

        ////////////////////////////////////////////////////////////
        DB::table('mujeres')->insert([
            'nombre' => 'Maria',
            'apellido' => 'Czaplicka',
            'lore_es' => 'Fue una antropóloga cultural polaca que es más conocida por su etnografía del chamanismo siberiano. La investigación de Czaplicka sobrevive en tres grandes obras: sus estudios en la "Aboriginal Siberia" (1914); un cuaderno de viaje publicado como "My Siberian Year "(1916); y una serie de conferencias publicadas como "The Turks of Central Asia" (1919). Curzon Press reeditó los tres volúmenes, más un cuarto volumen de artículos y cartas, en 1999.',
            'lore_eus' => 'Poloniar kulturako antropologo bat izan zen, eta ezagunagoa da bere etnografia siberiarrean. Czaplikkaren ikerketa hiru lan handitan bizi da: "Aboriginal Siberia" (1914), "My Siberian Year" (1916) bidaia-koadernoa; eta "The Turks of Central Asia" (1919) bezalako hitzaldiak. Curzon Pressek hiru liburukiak berrargitaratu zituen, gehi artikuluen eta karten laugarren liburukia, 1999an.',
            'lore_en' => 'She was a Polish cultural anthropologist who is best known for her ethnography of Siberian shamanism. Czaplicka\'s research survives in three major works: her studies in Aboriginal Siberia (1914); a travelogue published as My Siberian Year (1916); and a set of lectures published as The Turks of Central Asia (1919). Curzon Press republished all three volumes, plus a fourth volume of articles and letters, in 1999.',
            'zona_geografica' => 'Europa',
            'ambito_id' => 1,
            'continente_id' => 1,
            'fecha_nacimiento' => Carbon::parse('25-10-1884'),
            'fecha_muerte' => Carbon::parse('27-5-1921'),

        ]);
        DB::table('datos')->insert([
            'mujer_id' => 6,
            'dato' => 'Su investigación sobrevive en tres libros',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 6,
            'dato' => 'Es conocida por su etnografía del chamanismo siberiano',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 6,
            'dato' => 'También escribía poemas e incluso fueron publicados en la revista "Odrodzenie"',
        ]);

        ////////////////////////////////////////////////////////////
        DB::table('mujeres')->insert([
            'nombre' => 'Frances',
            'apellido' => 'Densmore',
            'lore_es' => 'Fue una antropóloga y etnógrafa estadounidense nacida en Red Wing, Minnesota. Densmore es conocida por sus estudios de música y cultura nativa americana, y en términos modernos, puede ser descrita como una etnomusicóloga.',
            'lore_eus' => 'Wing (Minnesota) Sarean jaiotako antropologo eta etnografo estatubatuarra izan zen. Densmore ezaguna da bere musika eta kultura natiboko ikasketengatik, eta termino modernoetan, etnomusikologoa bezala deskribatu daiteke.',
            'lore_en' => 'She was an American anthropologist and ethnographer born in Red Wing, Minnesota. Densmore is known for her studies of Native American music and culture, and in modern terms, she may be described as an ethnomusicologist.',
            'zona_geografica' => 'Norteamérica',
            'ambito_id' => 1,
            'continente_id' => 4,
            'fecha_nacimiento' => Carbon::parse('21-5-1867'),
            'fecha_muerte' => Carbon::parse('5-6-1957'),
        ]);
        DB::table('datos')->insert([
            'mujer_id' => 7,
            'dato' => 'Puede ser descrita como una etnomusicóloga',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 7,
            'dato' => 'Es conocida por sus estudios de música y cultura nativa americana',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 7,
            'dato' => 'Ayudó a preservar la cultura nativo americana en un momento en que la política del gobierno era alentar a los nativos americanos a adoptar las costumbres occidentales.',
        ]);


        ////////////////////////////////////////////////////////////
        DB::table('mujeres')->insert([
            'nombre' => 'Leela',
            'apellido' => 'Dube',
            'lore_es' => 'Fue una antropóloga de renombre y estudiosa feminista, a la que muchos llaman con cariño Leeladee. Fue viuda del antropólogo y sociólogo Shyama Charan Dube y hermana menor del fallecido cantante clásico Sumati Mutatkar.',
            'lore_eus' => 'Feminista ospetsu eta aztoratu bat izan zen, eta askok maitasunez Leeladee deitzen diote. Shyama Charan Dube antropologo eta soziologoaren alarguna eta Sumati Mutatkar abeslari klasikoaren arreba txikia izan zen.',
            'lore_en' => 'She was a renowned anthropologist and feminist scholar, fondly called Leeladee by many. She was the widow of anthropologist and sociologist Shyama Charan Dube and a younger sister of the late classical singer Sumati Mutatkar.',
            'zona_geografica' => 'India',
            'ambito_id' => 1,
            'continente_id' => 2,
            'fecha_nacimiento' => Carbon::parse('27-3-1923'),
            'fecha_muerte' => Carbon::parse('20-5-2012'),
        ]);
        DB::table('datos')->insert([
            'mujer_id' => 8,
            'dato' => 'Fue responsable de introducir las preocupaciones de los estudios de la mujer en la sociología convencional',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 8,
            'dato' => 'En 2007 recibió el premio Lifetime Achievement Award de la Indian Sociological Society',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 8,
            'dato' => 'En su libro examina el género, el parentesco y la cultura obteniendo una variedad de materiales no convencionales, como cuentos populares, canciones populares, proverbios, leyendas y mitos para construir un perfil etnográfico del pensamiento feminista',
        ]);

        ////////////////////////////////////////////////////////////
        DB::table('mujeres')->insert([
            'nombre' => 'Kimberlé',
            'apellido' => 'Crenshaw',
            'lore_es' => 'Kimberlé Williams Crenshaw es una académica estadounidense especializada en el campo de la teoría crítica de la raza, y profesora de la Facultad de Derecho de UCLA y la Facultad de Derecho de Columbia, donde se dedica a la investigación sobre temáticas de raza y género',
            'lore_eus' => 'Kimberlé Williams Crenshaw arrazaren teoria kritikoaren esparruan espezializatutako AEBetako akademiko bat da, UCLA Zuzenbide Fakultateko irakaslea eta Columbiako Zuzenbide Fakultateko irakaslea, arraza eta genero gaien inguruko ikerketari buruzkoa.',
            'lore_en' => 'Kimberlé Williams Crenshaw is an American lawyer, civil rights advocate, philosopher, and a leading scholar of critical race theory who developed the theory of intersectionality. She is a full-time professor at the UCLA School of Law and Columbia Law School, where she specializes in race and gender issues. Crenshaw is also the founder of Columbia Law School\'s Center for Intersectionality and Social Policy Studies (CISPS) and the African American Policy Forum (AAPF), as well as the president of the Berlin-based Center for Intersectional Justice (CIJ). Crenshaw is known for the introduction and development of intersectionality, the theory of how overlapping or intersecting social identities, particularly minority identities, relate to systems and structures of oppression, domination, or discrimination. Her scholarship was also essential in the development of intersectional feminism which examines the overlapping systems of oppression and discrimination to which women are subject due to their ethnicity, sexuality and economic background.',
            'zona_geografica' => 'Norteamérica',
            'ambito_id' => 2,
            'continente_id' => 4,
            'fecha_nacimiento' => Carbon::parse('0-0-1952'),
            'fecha_muerte' => null,
        ]);
        DB::table('datos')->insert([
            'mujer_id' => 9,
            'dato' => 'Es especializada en el campo de la teoría crítica de la raza',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 9,
            'dato' => 'Se dedica a la investigación sobre temáticas de raza y género',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 9,
            'dato' => 'Es una de los fundadores del campo de la teoría crítica de la raza.',
        ]);
        ////////////////////////////////////////////////////////////
        DB::table('mujeres')->insert([
            'nombre' => 'Edith',
            'apellido' => 'Abbott',
            'lore_es' => 'Economista, trabajadora social, educadora, y escritora estadounidense. Abbott era aborigen de Grand Island. Edith Abbott fue una pionera en la profesión de trabajo social con una formación académica en economía.',
            'lore_eus' => 'Edith Abbott was an American economist, social worker, educator and writer. Abbott was an Aborigine of Grand Island. Edith Abbott was a pioneer in the profession of social worker with academic formation in economy.',
            'lore_en' => 'Ekonomista, gizarte langilea, hezitzailea eta idazle estatubatuarra. Abbott Grand Islandeko aborigen zen. Edith Abbott aitzindaria izan zen gizarte-laneko lanbidean, ekonomia arloan prestakuntza akademikoa emanda.',
            'zona_geografica' => 'Norteamérica',
            'ambito_id' => 7,
            'continente_id' => 4,
            'fecha_nacimiento' => Carbon::parse('26-9-1876'),
            'fecha_muerte' => Carbon::parse('28-7-1957'),
        ]);
        DB::table('datos')->insert([
            'mujer_id' => 10,
            'dato' => 'Fue la primera mujer decana en EE.UU.',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 10,
            'dato' => 'Fue reformadora de la legislación laboral infantil ',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 10,
            'dato' => 'Derivó un plan de estudios para estudiantes que deseaban una carrera en trabajo social.',
        ]);


        ////////////////////////////////////////////////////////////
        DB::table('mujeres')->insert([
            'nombre' => 'Irma',
            'apellido' => 'Adelman',
            'lore_es' => 'Sus contribuciones más notables a la economía buscan la aplicación de modelos matemáticos para la planificación del desarrollo. Ha utilizado técnicas de análisis multivariables para estudiar las interacciones entre las fuerzas productivas, sociales y económicas en los países en vías de desarrollo.',
            'lore_eus' => 'Ekonomiaren ekarpen nabarmenenak garapen planifikaziorako eredu matematikoak aplikatzea bilatzen du. Analisi anitzak egiteko teknikak erabili ditu garapen bidean dauden herrialdeetan indar produktibo, sozial eta ekonomikoen arteko elkarreraginak aztertzeko.',
            'lore_en' => 'Her most prominent contributions to the economy look for the aplication of mathematical models for the development planification. She used multivariate analysis techniques to study the interactions between the productive, socials, economics forces in developing countries. ',
            'zona_geografica' => 'Norteamérica',
            'ambito_id' => 7,
            'continente_id' => 4,
            'fecha_nacimiento' => Carbon::parse('14-3-1930'),
            'fecha_muerte' => Carbon::parse('5-2-2017'),

        ]);
        DB::table('datos')->insert([
            'mujer_id' => 11,
            'dato' => 'Se graduó como la primera de su promoción',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 11,
            'dato' => 'Escribió un libro titulado "Teoría sobre el crecimiento y desarrollo económico".',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 11,
            'dato' => 'Sus trabajos aún hoy resultan claves para comprender la evolución y desarrollo de la sociedad moderna.',
        ]);

        ////////////////////////////////////////////////////////////
        DB::table('mujeres')->insert([
            'nombre' => 'Marianne',
            'apellido' => 'Bertrand',
            'lore_es' => 'Economista Belga, actualmente trabaja como Profesora de economía en la universidad de Chicago. Los trabajos de Bertrand son los mas destacados en económicas. En 2004 recibió el premio " Premio de Investigación Elaine Bennett" y en 2012 recibió el premio Sherwin Rosen por sus excepcionales aportaciones a la economía.',
            'lore_eus' => 'Ekonomialari belgikarra da, Chicagoko Unibertsitateko Booth School of Business erakundeko ekonomia irakaslea da. Bertrand ikerketa alorreko munduko ekonomialaririk nabarmenenetakoa da. Izan ere, 2004ko Elaine Bennett Ikerketa Saria jaso du eta 2012ko Sherwin Rosen Saria lanaren ekonomiaren alorrean egindako ekarpen nabarmenei.',
            'lore_en' => 'A Belgian economist who currently works as Chris P. Dialynas Professor of Economics at the University of Chicago\'s Booth School of Business. Bertrand belongs to the world\'s most prominent labour economists in terms of research, which has been awarded the 2004 Elaine Bennett Research Prize and the 2012 Sherwin Rosen Prize for Outstanding Contributions in the Field of Labor Economics.',
            'zona_geografica' => 'Bélgica',
            'ambito_id' => 7,
            'continente_id' => 1,
            'fecha_nacimiento' => Carbon::parse('0-0-1970'),
            'fecha_muerte' => null,
        ]);
        DB::table('datos')->insert([
            'mujer_id' => 12,
            'dato' => 'Ha sido coeditora del Economic Journal y editora asociada de varias revistas científicas.',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 12,
            'dato' => 'Está especializada en microeconomía aplicada.',
        ]);

        DB::table('datos')->insert([
            'mujer_id' => 12,
            'dato' => 'Investigó sobre la economía laboral, discriminación y brechas de género',
        ]);
    }
}
        ////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////
//        DB::table('mujeres')->insert([
//            'nombre' => '',
//            'apellido' => '',
//            'lore_es' => '',
//            'lore_eus' => '',
//            'lore_en' => '',
//            'zona_geografica' => '',
//            'ambito_id' => ,
//            'continente_id' => ,
//            'fecha_nacimiento' => ,
//            'fecha_muerte' => ,
//        ]);
//        DB::table('datos')->insert([
//            'mujer_id' => 13,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 13,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 13,
//            'dato' => '',
//        ]);
//
//
//        ////////////////////////////////////////////////////////////
//        DB::table('mujeres')->insert([
//            'nombre' => '',
//            'apellido' => '',
//            'lore_es' => '',
//            'lore_eus' => '',
//            'lore_en' => '',
//            'zona_geografica' => '',
//            'ambito_id' => ,
//            'continente_id' => ,
//            'fecha_nacimiento' => ,
//            'fecha_muerte' => ,
//        ]);
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//
//        ////////////////////////////////////////////////////////////
//        DB::table('mujeres')->insert([
//            'nombre' => '',
//            'apellido' => '',
//            'lore_es' => '',
//            'lore_eus' => '',
//            'lore_en' => '',
//            'zona_geografica' => '',
//            'ambito_id' => ,
//            'continente_id' => ,
//            'fecha_nacimiento' => ,
//            'fecha_muerte' => ,
//        ]);
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//
//        ////////////////////////////////////////////////////////////
//        DB::table('mujeres')->insert([
//            'nombre' => '',
//            'apellido' => '',
//            'lore_es' => '',
//            'lore_eus' => '',
//            'lore_en' => '',
//            'zona_geografica' => '',
//            'ambito_id' => ,
//            'continente_id' => ,
//            'fecha_nacimiento' => ,
//            'fecha_muerte' => ,
//        ]);
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//
//        ////////////////////////////////////////////////////////////
//        DB::table('mujeres')->insert([
//            'nombre' => '',
//            'apellido' => '',
//            'lore_es' => '',
//            'lore_eus' => '',
//            'lore_en' => '',
//            'zona_geografica' => '',
//            'ambito_id' => ,
//            'continente_id' => ,
//            'fecha_nacimiento' => ,
//            'fecha_muerte' => ,
//        ]);
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//
//        ////////////////////////////////////////////////////////////
//        DB::table('mujeres')->insert([
//            'nombre' => '',
//            'apellido' => '',
//            'lore_es' => '',
//            'lore_eus' => '',
//            'lore_en' => '',
//            'zona_geografica' => '',
//            'ambito_id' => ,
//            'continente_id' => ,
//            'fecha_nacimiento' => ,
//            'fecha_muerte' => ,
//        ]);
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//
//        ////////////////////////////////////////////////////////////
//        DB::table('mujeres')->insert([
//            'nombre' => '',
//            'apellido' => '',
//            'lore_es' => '',
//            'lore_eus' => '',
//            'lore_en' => '',
//            'zona_geografica' => '',
//            'ambito_id' => ,
//            'continente_id' => ,
//            'fecha_nacimiento' => ,
//            'fecha_muerte' => ,
//        ]);
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//
//        ////////////////////////////////////////////////////////////
//        DB::table('mujeres')->insert([
//            'nombre' => '',
//            'apellido' => '',
//            'lore_es' => '',
//            'lore_eus' => '',
//            'lore_en' => '',
//            'zona_geografica' => '',
//            'ambito_id' => ,
//            'continente_id' => ,
//            'fecha_nacimiento' => ,
//            'fecha_muerte' => ,
//        ]);
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//
//        ////////////////////////////////////////////////////////////
//        DB::table('mujeres')->insert([
//            'nombre' => '',
//            'apellido' => '',
//            'lore_es' => '',
//            'lore_eus' => '',
//            'lore_en' => '',
//            'zona_geografica' => '',
//            'ambito_id' => ,
//            'continente_id' => ,
//            'fecha_nacimiento' => ,
//            'fecha_muerte' => ,
//        ]);
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//
//        ////////////////////////////////////////////////////////////
//        DB::table('mujeres')->insert([
//            'nombre' => '',
//            'apellido' => '',
//            'lore_es' => '',
//            'lore_eus' => '',
//            'lore_en' => '',
//            'zona_geografica' => '',
//            'ambito_id' => ,
//            'continente_id' => ,
//            'fecha_nacimiento' => ,
//            'fecha_muerte' => ,
//        ]);
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//
//        ////////////////////////////////////////////////////////////
//        DB::table('mujeres')->insert([
//            'nombre' => '',
//            'apellido' => '',
//            'lore_es' => '',
//            'lore_eus' => '',
//            'lore_en' => '',
//            'zona_geografica' => '',
//            'ambito_id' => ,
//            'continente_id' => ,
//            'fecha_nacimiento' => ,
//            'fecha_muerte' => ,
//        ]);
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//
//        ////////////////////////////////////////////////////////////
//        DB::table('mujeres')->insert([
//            'nombre' => '',
//            'apellido' => '',
//            'lore_es' => '',
//            'lore_eus' => '',
//            'lore_en' => '',
//            'zona_geografica' => '',
//            'ambito_id' => ,
//            'continente_id' => ,
//            'fecha_nacimiento' => ,
//            'fecha_muerte' => ,
//        ]);
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//
//
//        //////////////////////////PLANTILLA//////////////////////////////////
//        DB::table('mujeres')->insert([
//            'nombre' => '',
//            'apellido' => '',
//            'lore_es' => '',
//            'lore_eus' => '',
//            'lore_en' => '',
//            'zona_geografica' => '',
//            'ambito_id' => ,
//            'continente_id' => ,
//            'fecha_nacimiento' => ,
//            'fecha_muerte' => ,
//        ]);
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//        DB::table('datos')->insert([
//            'mujer_id' => 3,
//            'dato' => '',
//        ]);
//
//    }
//}
