<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malaysia - ASEAN AI Booth 2026</title>
    <link rel="icon" type="image/png" href="/favicon.png" />
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script crossorigin src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://unpkg.com/framer-motion@10.16.4/dist/framer-motion.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=DM+Mono:wght@400;500&family=Space+Grotesk:wght@300;400;500;600;700&display=swap');
        
        * { margin: 0; padding: 0; box-sizing: border-box; scroll-behavior: smooth; }
        
        :root {
            --gold: #C9A961;
            --gold-light: #E0D5C7;
            --black: #0f0f0f;
            --text-dark: #1a1a1a;
            --bg-light: #FEFDFB;
            --bg-cream: #F5F3F0;
            --accent: #2D5016;
            --white: #FFFFFF;
        }

        body { 
            font-family: 'Space Grotesk', -apple-system, sans-serif;
            background: var(--bg-light);
            color: var(--text-dark);
            overflow-x: hidden;
            line-height: 1.5;
        }
        
        h1, h2, h3, h4, .serif { font-family: 'Playfair Display', serif; }
        .mono { font-family: 'DM Mono', monospace; }

        .glass {
            background: rgba(255,253,251,0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(201,169,97,0.1);
        }

        .glass-dark {
            background: rgba(15,15,15,0.9);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.1);
        }

        .gold-glow { box-shadow: 0 0 40px rgba(201,169,97,0.15); }
        .text-gradient { background: linear-gradient(135deg, var(--gold) 0%, #B8860B 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        
        /* Custom Animations */
        @keyframes float-kite { 
            0%, 100% { transform: translate(0, 0) rotate(5deg); } 
            50% { transform: translate(-20px, -30px) rotate(-5deg); } 
        }
        .animate-kite { animation: float-kite 8s ease-in-out infinite; }

        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob { animation: blob 10s infinite; }

        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gold: { DEFAULT: '#C9A961', light: '#E0D5C7', dark: '#9D7E47' },
                        black: '#0f0f0f',
                        cream: '#F5F3F0',
                    },
                    fontFamily: {
                        serif: ['Playfair Display', 'serif'],
                        sans: ['Space Grotesk', 'sans-serif'],
                        mono: ['DM Mono', 'monospace'],
                    }
                }
            }
        }
    </script>
</head>
<body class="antialiased selection:bg-gold/30">
    <div id="root"></div>

    <script type="text/babel">
        const { useState, useEffect, useRef, createContext, useContext } = React;
        const { motion, AnimatePresence, useScroll, useTransform, useInView, useSpring } = window.Motion;

        // --- ICONS ---
        const Icons = {
            X: () => <i data-lucide="x" className="w-6 h-6" />,
            Menu: () => <i data-lucide="menu" className="w-6 h-6" />,
            ChevronRight: () => <i data-lucide="chevron-right" className="w-5 h-5" />,
            ChevronLeft: () => <i data-lucide="chevron-left" className="w-5 h-5" />,
            Trophy: () => <i data-lucide="trophy" className="w-6 h-6" />,
            Gamepad: () => <i data-lucide="gamepad-2" className="w-6 h-6" />,
            Bot: () => <i data-lucide="bot" className="w-6 h-6" />,
            Send: () => <i data-lucide="send" className="w-5 h-5" />,
            Sparkles: () => <i data-lucide="sparkles" className="w-5 h-5" />,
            Info: () => <i data-lucide="info" className="w-5 h-5" />,
            Heart: () => <i data-lucide="heart" className="w-5 h-5" />
        };

        // --- DATA ---
        const MALAYSIA_DATA = {
            games: [
                {
                    id: "congkak",
                    title: "Congkak",
                    type: "Strategy Board Game",
                    desc: "A traditional Malay game of logic and mental calculation using a wooden board and marbles.",
                    rules: "Distribute marbles into holes. The goal is to collect the most marbles in your 'store'. Avoid empty holes!",
                    color: "from-amber-700 to-orange-900"
                },
                {
                    id: "batu",
                    title: "Batu Seremban",
                    type: "Dexterity Game",
                    desc: "A game of tossing and catching stones, testing hand-eye coordination and speed.",
                    rules: "Throw a stone, pick up others, and catch the falling one. Levels get harder!",
                    color: "from-teal-600 to-emerald-800"
                }
            ],
            heritage: [
                { id: 'culture', label: 'Culture', icon: '🎭', items: [
                    { title: "Batik Painting", desc: "Wax-resist dyeing technique creating intricate patterns.", detail: "Malaysian Batik is famous for its large floral motifs and vibrant colors, often used for formal wear and sarongs." },
                    { title: "Wayang Kulit", desc: "Traditional shadow puppetry theater.", detail: "Ancient form of storytelling using leather puppets projected onto a screen, accompanied by Gamelan music." },
                    { title: "Wau Bulan", desc: "Moon-kite flying tradition.", detail: "Intricately designed kites flown in Kelantan, symbolizing national pride and craftsmanship." }
                ]},
                { id: 'food', label: 'Culinary', icon: '🍜', items: [
                    { title: "Nasi Lemak", desc: "Fragrant rice cooked in coconut milk.", detail: "The national dish, served with sambal, anchovies, peanuts, and boiled egg. A breakfast staple." },
                    { title: "Satay", desc: "Seasoned, skewered and grilled meat.", detail: "Served with a spicy peanut sauce sauce, cucumber, and onions. Popular in Kajang." },
                    { title: "Teh Tarik", desc: "Pulled milk tea.", detail: "The 'pulling' creates a thick frothy top and cools the tea. A symbol of Malaysian hospitality." }
                ]},
                { id: 'nature', label: 'Nature', icon: '🌴', items: [
                    { title: "Taman Negara", desc: "130 million years old rainforest.", detail: "Older than the Amazon, home to tigers, elephants, and the rafflesia flower." },
                    { title: "Mount Kinabalu", desc: "Highest peak in Southeast Asia.", detail: "A UNESCO World Heritage site with diverse flora and fauna in Sabah." },
                    { title: "Sipadan Island", desc: "World-class diving destination.", detail: "Famous for its turtle tomb and barracuda vortex. A marine paradise." }
                ]}
            ],
            quiz: [
                { q: "What is the national flower of Malaysia?", options: ["Orchid", "Hibiscus", "Rose", "Sunflower"], a: 1 },
                { q: "Which year did Malaysia achieve independence?", options: ["1963", "1946", "1957", "1990"], a: 2 },
                { q: "What is the tallest twin tower in the world?", options: ["KL Tower", "Merdeka 118", "Petronas Twin Towers", "Exchange 106"], a: 2 },
                { q: "Where is the historic city of Melaka located?", options: ["North", "East Coast", "West Coast", "Borneo"], a: 2 },
                { q: "Which state is known for 'Nasi Kandar'?", options: ["Johor", "Penang", "Perak", "Selangor"], a: 1 }
            ]
        };

        // Comprehensive Malaysia Q&A Database
        const MALAYSIA_QA_DATABASE = {
            "language": [
                { q: "What is the official language of Malaysia?", a: "The official language of Malaysia is Malay or Bahasa Malaysia. The Article 152 of the Federal Constitution explains that Bahasa Malaysia is an official language whose function and role as the National Language cannot be disputed. The Malay language is a significant linguistic medium in Southeast Asia, serving as the national language in Malaysia, Indonesia, Brunei, and Singapore." },
                { q: "What is Bahasa Malaysia also commonly called?", a: "Bahasa Malaysia is also commonly referred to as Bahasa Melayu." },
                { q: "How many indigenous languages are spoken in Malaysia", a: "Malaysia is also home to an impressive number of indigenous languages. 137 indigenous languages are spoken in various parts of the country." },
                { q: "Which writing system is used for Bahasa Malaysia today?", a: "The primary writing system used for Bahasa Malaysia (the Malay language) today is the Latin script, which is known locally as Rumi." },
                { q: "Was a different script used historically for Malay?", a: "Yes. Historically, the Jawi script, originating from the Arabic script, was utilized for writing the Malay language across the Malay Archipelago, including Singapore, serving as the primary script for various written materials." },
                { q: "Is English widely spoken in Malaysia?", a: "Yes. English is widely spoken, especially in business, education, and urban areas." },
                { q: "Are there other languages spoken in Malaysia besides Malay and English?", a: "Yes. Many Malaysians also speak Chinese languages (such as Mandarin, Cantonese, and Hokkien), Tamil, and various indigenous languages." },
                { q: "Why is Malaysia considered a multilingual country?", a: "Malaysia is multilingual due to its diverse ethnic groups, historical trade, and colonial influences." },
                { q: "Which indigenous languages are most widely spoken in Malaysia?", a: "In the states of Sabah and Sarawak on the island of Borneo, the dominant languages that cut across ethnic boundaries are Kadazan-Dusun and Iban." },
                { q: "Does Bahasa Malaysia use verb conjugation?", a: "No. Bahasa Malaysia does not use verb conjugation to show tense. Time is usually indicated using context or time-related words." },
                { q: "What are the main indigenous language groups found on the peninsular side of Malaysia?", a: "The indigenous languages found on the peninsular side of Malaysia can be divided into three major language groups: the Negrito, Senoi, and Malayic (also known as Proto-Malay); these can then be further divided into more than 18 subgroups according to their different languages and cultures." },
                { q: "Are there gendered nouns in Bahasa Malaysia?", a: "No. Bahasa Malaysia does not have grammatical gender." },
                { q: "How does Bahasa Malaysia form plural nouns?", a: "Plurals are often shown through word repetition or inferred from context." },
                { q: "What role does Bahasa Malaysia play in Malaysian society?", a: "Bahasa Malaysia serves as a unifying national language and is used in government, education, and official communication." },
                { q: "How is Bahasa Malaysia different from Indonesian?", a: "They are closely related and mutually understandable, but they differ in vocabulary, pronunciation, and spelling." },
                { q: "Is Bahasa Malaysia difficult to learn for beginners?", a: "No. Bahasa Malaysia is often considered easy to learn because of its simple grammar and pronunciation." },
                { q: "Are there formal and informal speech styles in Bahasa Malaysia?", a: "Yes. Different levels of formality are used depending on the social context and relationship between speakers." },
                { q: "Are Malaysians required to use Bahasa Malaysia?", a: "Yes. Bahasa Malaysia is required for official and legal purposes, including government communication and education." },
                { q: "How does language relate to Malaysian cultural diversity?", a: "Language is fundamental to Malaysian cultural diversity. The coexistence of Malay, Chinese, Tamil, and indigenous languages reflects Malaysia's multicultural society and ethnic diversity. Each language carries unique cultural values and traditions." },
                { q: "How does language influence Malaysian customs and traditions?", a: "Language shapes customs and traditions. Different ethnic groups use their native languages in rituals, ceremonies, prayers, and storytelling, preserving cultural heritage and transmitting values across generations." }
            ],
            "customs": [
                { q: "What are Malaysian customs and traditions?", a: "Malaysian customs and traditions reflect the country's diverse ethnic groups, including Malay, Chinese, Indian, and indigenous communities, and emphasize respect, harmony, and community living." },
                { q: "Why is Malaysia culturally diverse?", a: "Malaysia is culturally diverse because it is home to many ethnic groups with different religions, languages, and historical backgrounds." },
                { q: "How do Malaysians usually greet each other?", a: "Malaysians generally greet each other politely with a handshake. Some people place their hand over their heart as a sign of respect." },
                { q: "Why is the right hand important in Malaysian culture?", a: "The right hand is traditionally used for eating, giving, and receiving items, as it is considered more polite." },
                { q: "How are elders treated in Malaysian society?", a: "Elders are highly respected, and people are expected to speak and behave politely toward them." },
                { q: "How does religion influence customs in Malaysia?", a: "Religion plays an important role in shaping daily behavior, clothing, food practices, and festivals in Malaysia." },
                { q: "What traditional clothing is worn in Malaysia?", a: "Traditional clothing includes Baju Melayu and Baju Kurung for Malays, Cheongsam for Chinese, and Saree for Indians, especially during celebrations." },
                { q: "What major festivals are celebrated in Malaysia?", a: "Major festivals include Hari Raya Aidilfitri, Chinese New Year, Deepavali, Gawai Dayak, and Kaamatan." },
                { q: "What is the open house tradition in Malaysia?", a: "An open house is a cultural practice where people invite guests to their homes during festivals to share food and celebrate together." },
                { q: "How important is food in Malaysian culture?", a: "Food is very important in Malaysian culture and is often used as a way to socialize and strengthen relationships." },
                { q: "What does halal mean in Malaysian customs?", a: "Halal refers to food and practices that follow Islamic guidelines, which are widely observed in Malaysia." },
                { q: "What should visitors do when entering a Malaysian home?", a: "Visitors should remove their shoes before entering and greet the host politely." },
                { q: "What behavior is expected in public places in Malaysia?", a: "People are expected to behave modestly and respectfully, especially in religious sites and rural areas." },
                { q: "What are common Malaysian marriage traditions?", a: "Marriage traditions vary by ethnic group but usually involve family participation, traditional ceremonies, and cultural rituals." },
                { q: "What are funeral customs like in Malaysia?", a: "Funeral customs differ by religion and culture, and it is important to respect the family's traditions and practices." },
                { q: "What is batik and why is it important in Malaysian customs?", a: "Batik is a traditional fabric art made using wax and dye. It is an important part of Malaysian cultural identity and is commonly worn for formal and casual occasions during celebrations." },
                { q: "What is songket and when is it worn?", a: "Songket is a handwoven fabric decorated with gold or silver threads, traditionally worn during ceremonies and special events as part of Malaysian tradition." },
                { q: "How does family importance reflect in Malaysian customs?", a: "Family is central to Malaysian customs and culture. Individuals are expected to support and care for their family members, and family participation is essential in all traditional ceremonies." }
            ],
            "arts": [
                { q: "What are traditional arts and crafts in Malaysia?", a: "Traditional Malaysian arts and crafts include textiles, woodcarving, metalwork, pottery, and weaving, reflecting the country's cultural diversity." },
                { q: "What is batik and why is it important in Malaysia?", a: "Batik is a traditional fabric art made using wax and dye. It is an important part of Malaysian cultural identity and is commonly worn for formal and casual occasions." },
                { q: "What is songket?", a: "Songket is a handwoven fabric decorated with gold or silver threads, traditionally worn during ceremonies and special events." },
                { q: "What materials are commonly used in Malaysian crafts?", a: "Common materials include cotton, silk, bamboo, rattan, wood, clay, and metal." },
                { q: "What is woodcarving in Malaysian culture?", a: "Woodcarving is a traditional craft used to decorate homes, mosques, and cultural objects, especially in Malay communities." },
                { q: "What are Malaysian handicrafts made from natural materials?", a: "Many handicrafts are made from bamboo, rattan, pandan leaves, and coconut shells." },
                { q: "What is traditional Malaysian pottery?", a: "Traditional pottery includes handmade clay items such as cooking pots, water containers, and decorative objects." },
                { q: "Are arts and crafts influenced by different cultures in Malaysia?", a: "Yes. Malaysian arts and crafts are influenced by Malay, Chinese, Indian, and indigenous traditions." },
                { q: "What are indigenous arts and crafts in Malaysia?", a: "Indigenous communities produce crafts such as beadwork, basket weaving, bark cloth, and wood sculptures." },
                { q: "What role do arts and crafts play in Malaysian culture?", a: "Arts and crafts preserve cultural heritage, express identity, and are passed down through generations." },
                { q: "Are traditional arts and crafts still practiced today?", a: "Yes. Traditional crafts are still practiced and are supported through cultural programs and tourism." },
                { q: "Where can people see or buy Malaysian arts and crafts?", a: "Malaysian arts and crafts can be found at cultural centers, craft markets, museums, and festivals." },
                { q: "How are Malaysian arts and crafts taught?", a: "Skills are often passed down within families, communities, and through formal cultural education programs." },
                { q: "What is the difference between Malaysian batik and Indonesian batik?", a: "Malaysian batik often features floral and geometric designs and is typically hand-painted rather than stamped." },
                { q: "Why are arts and crafts important to Malaysia's identity?", a: "Arts and crafts represent Malaysia's history, creativity, and multicultural heritage." },
                { q: "How do Malaysian arts and crafts reflect cultural values?", a: "Malaysian arts and crafts embody cultural values of respect, harmony, and family legacy. Intricate designs represent patience and dedication, while traditional patterns reflect spiritual and cultural beliefs of different communities." },
                { q: "What is the connection between Malaysian arts and religious traditions?", a: "Religion influences Malaysian art forms. Islamic geometric patterns appear in woodcarving and architecture, Hindu and Buddhist symbolism inspires textile designs, and indigenous spiritual beliefs influence indigenous crafts and artworks." }
            ],
            "religion": [
                { q: "What are the main religions practiced in Malaysia?", a: "The main religions in Malaysia are Islam, Buddhism, Christianity, Hinduism, and traditional indigenous beliefs." },
                { q: "What is the official religion of Malaysia?", a: "Islam is the official religion of Malaysia, as stated in the Constitution." },
                { q: "Can people in Malaysia practice other religions freely?", a: "Yes. The Constitution allows people to practice other religions in peace and harmony." },
                { q: "Why is Islam important in Malaysian society?", a: "Islam influences laws, customs, festivals, and daily life, especially among the Malay population." },
                { q: "Are all Malaysians Muslim?", a: "No. Malaysia is religiously diverse, and people follow different religions depending on their ethnic and cultural backgrounds." },
                { q: "What religions do Chinese Malaysians usually follow?", a: "Chinese Malaysians commonly practice Buddhism, Taoism, Confucianism, or Christianity." },
                { q: "What religions do Indian Malaysians usually follow?", a: "Indian Malaysians mainly practice Hinduism, with some practicing Christianity or Islam." },
                { q: "What beliefs do indigenous communities in Malaysia follow?", a: "Indigenous communities may practice Christianity, Islam, or traditional animistic beliefs." },
                { q: "How does religion affect daily life in Malaysia?", a: "Religion influences clothing, food choices, public holidays, education, and social behavior." },
                { q: "What are some major religious festivals celebrated in Malaysia?", a: "Major religious festivals include Hari Raya Aidilfitri, Chinese New Year, Deepavali, Christmas, Gawai Dayak, and Kaamatan." },
                { q: "Are there religious places of worship in Malaysia?", a: "Yes. Malaysia has mosques, temples, churches, and shrines for different religions." },
                { q: "What is halal and why is it important in Malaysia?", a: "Halal refers to practices and food that follow Islamic guidelines and are important for Muslim communities." },
                { q: "Is religious harmony important in Malaysia?", a: "Yes. Respect and tolerance between different religions are strongly valued in Malaysian society." },
                { q: "Are religious symbols commonly seen in Malaysia?", a: "Yes. Religious symbols and attire are commonly seen and respected in public spaces." },
                { q: "How are religious beliefs taught in Malaysia?", a: "Religious beliefs are taught through families, community institutions, and formal education, depending on religion." },
                { q: "How does religion influence traditional clothing in Malaysia?", a: "Religion plays a significant role in determining traditional attire. Islamic influence leads to modest dress like Baju Melayu, while Chinese traditions favor Cheongsam, and Indian religions influence the wearing of Sarees." },
                { q: "What is the relationship between religion and Malaysian festivals?", a: "Many major Malaysian festivals are religious in nature. Islamic festivals like Hari Raya, Hindu festivals like Deepavali, Buddhist festivals, and indigenous spiritual celebrations all reflect Malaysia's diverse religious landscape." }
            ],
            "architecture": [
                { q: "What is a traditional Malaysia house called?", a: "A Malay house is called 'rumah kampung', which directly translates to 'once upon a time'." },
                { q: "Where are these traditional houses found?", a: "These can be found in villages or countryside areas." },
                { q: "Are there any specific influences that affect the architectural style of the rumah kampung?", a: "The main influence to this is the environment. The design of the rumah kampung is specifically to withstand the tropical humid weather and to avoid flooding during heavy rainfall." },
                { q: "What is the Rumah Ibu of a traditional Malaysian house?", a: "Of the three sections of the house, the main section is the Rumah Ibu where the family eats, relaxes and entertains guests. The length of this section is determined by the span (depa) of the mother's/matriarch's arms. Windows along the walls are long and the entrance is through a short flight of steps or stairs." },
                { q: "What is the Rumah Dapur in traditional Malaysian houses?", a: "Rumah Dapur is the kitchen annexe. It is a separate building but linked to the main section by a passageway. It is an ingenious plan for when the kitchen catches fire – the stilts are cut off and thrown away from the house to be doused or into the river if there is one nearby." },
                { q: "What is the Rumah Tengah in a traditional Malaysian house?", a: "Rumah Tengah is the area for sleeping. The rooms are partitioned off, usually by curtains. The lavatory and bathroom are not within the main house, but built some distance away. The outside of the house is usually shaded with trees and vegetation. A short flight of steps or stairs leads to the elevated main section. The steps may be plain or decorated with tiles." },
                { q: "What construction method allows traditional Malay houses to be built without nails or metal supports?", a: "A Traditional Malay house is constructed with wood that has been cut in a way that it can slide together and interlock, which allows carpenters to build a house without the use of nails or metal support." },
                { q: "What is the Istana Lama Seri Menanti?", a: "The Istana Lama Seri Menanti building was built during the 20th century, a 5-storey timber palace was built without any iron nails or metal screws." },
                { q: "Why are traditional Malay houses and mosques designed with a specific orientation, and which direction do they face?", a: "Malay houses or mosques are designed based on orientation towards the Qibla in Mecca." }
            ],
            "attire": [
                { q: "What is traditional attire in Malaysia?", a: "Traditional attire in Malaysia refers to clothing worn by different ethnic groups that reflects their cultural heritage, especially during festivals and formal occasions." },
                { q: "What is the traditional attire of Malay men?", a: "Malay men traditionally wear Baju Melayu, usually paired with trousers and a sampin." },
                { q: "What is the traditional attire of Malay women?", a: "Malay women traditionally wear Baju Kurung or Baju Kebaya." },
                { q: "What is traditional Chinese attire in Malaysia?", a: "Traditional Chinese attire includes the Cheongsam for women and traditional Chinese outfits for men, worn during festivals and ceremonies." },
                { q: "What is traditional Indian attire in Malaysia?", a: "Traditional Indian attire includes the Saree for women and Kurta or Dhoti for men." },
                { q: "What traditional attire is worn by indigenous communities in Malaysia?", a: "Indigenous communities wear traditional clothing made from natural materials, often decorated with beadwork and unique patterns." },
                { q: "When do Malaysians usually wear traditional attire?", a: "Traditional attire is commonly worn during festivals, weddings, cultural events, and official ceremonies." },
                { q: "Are traditional clothes still worn in modern Malaysia?", a: "Yes. Traditional attire is still worn and is often combined with modern fashion styles." },
                { q: "Do traditional clothes differ by region in Malaysia?", a: "Yes. Traditional attire varies by region and ethnic group, with differences in design, fabric, and decoration." },
                { q: "What fabrics are commonly used in traditional Malaysian attire?", a: "Common fabrics include cotton, silk, batik, and songket." },
                { q: "What is a sampin and why is it worn?", a: "A sampin is a cloth worn over trousers by Malay men as part of traditional dress, symbolizing tradition and respect." },
                { q: "Are there rules about wearing traditional attire?", a: "Traditional attire is usually worn modestly, especially during religious or formal occasions." },
                { q: "Is traditional attire linked to cultural identity in Malaysia?", a: "Yes. Traditional attire is an important symbol of cultural identity and heritage in Malaysia." },
                { q: "Can non-Malaysians wear traditional Malaysian clothing?", a: "Yes. Non-Malaysians are welcome to wear traditional attire, especially during cultural celebrations, as a sign of appreciation." },
                { q: "Why is traditional attire important in Malaysia?", a: "Traditional attire preserves cultural heritage and represents Malaysia's multicultural identity." },
                { q: "What is batik used in traditional Malaysian attire?", a: "Batik is a traditional fabric art made using wax and dye that is commonly used in Malaysian traditional clothing, worn for both formal and casual occasions during celebrations." },
                { q: "What is songket and how is it worn in Malaysian attire?", a: "Songket is a handwoven fabric decorated with gold or silver threads, traditionally used in formal attire and worn during ceremonies and special events to showcase cultural pride." },
                { q: "How does religion influence Malaysian traditional attire?", a: "Religion significantly influences traditional dress in Malaysia. Islamic traditions promote modest, long-sleeved designs like Baju Melayu and Baju Kurung, while Chinese and Indian religions influence their respective traditional clothing styles." }
            ],
            "cuisine": [
                { q: "What is traditional Malaysian cuisine?", a: "Traditional Malaysian cuisine is a mix of Malay, Chinese, Indian, and indigenous cooking styles, known for its rich flavors and use of spices and herbs." },
                { q: "What are common ingredients used in Malaysian food?", a: "Common ingredients include rice, noodles, coconut milk, chili, spices, herbs, seafood, chicken, and beef." },
                { q: "What is nasi lemak?", a: "Nasi lemak is a popular Malaysian dish made of rice cooked in coconut milk, usually served with sambal, anchovies, peanuts, and egg." },
                { q: "What are traditional Malay dishes?", a: "Traditional Malay dishes include rendang, satay, laksa, and ketupat." },
                { q: "What are traditional Chinese Malaysian dishes?", a: "Traditional Chinese Malaysian dishes include char kway teow, Hainanese chicken rice, and bak kut teh." },
                { q: "What are traditional Indian Malaysian dishes?", a: "Traditional Indian Malaysian dishes include roti canai, tosai, and banana leaf rice." },
                { q: "Are Malaysian dishes usually spicy?", a: "Many Malaysian dishes are spicy, but non-spicy options are also widely available." },
                { q: "What role does street food play in Malaysian cuisine?", a: "Street food is an important part of Malaysian food culture and is widely enjoyed by locals and visitors." },
                { q: "What is halal food in Malaysia?", a: "Halal food follows Islamic dietary rules and is widely available across Malaysia." },
                { q: "Are vegetarian dishes common in Malaysia?", a: "Yes. Vegetarian dishes are common, especially in Indian and Buddhist cuisines." },
                { q: "What is sambal?", a: "Sambal is a chili-based paste or sauce commonly served with Malaysian dishes." },
                { q: "What desserts are popular in Malaysia?", a: "Popular desserts include kuih, cendol, and ais kacang." },
                { q: "When is traditional food commonly served?", a: "Traditional food is commonly served during daily meals, festivals, family gatherings, and celebrations." },
                { q: "How is food usually eaten in Malaysia?", a: "Food may be eaten with the hand, spoon and fork, or chopsticks, depending on the dish and cultural practice." },
                { q: "Why is food important in Malaysian culture?", a: "Food plays a central role in social life and is a key expression of Malaysia's cultural diversity." },
                { q: "How does religious belief affect Malaysian cuisine?", a: "Religion significantly influences Malaysian food. Islamic halal practices guide Muslim food preparation, while Hindu traditions influence vegetarian cuisines, and Buddhist communities emphasize plant-based dishes." },
                { q: "How is food connected to Malaysian customs and traditions?", a: "Food is central to Malaysian customs. Open house traditions during festivals, sharing food with guests, and family meals strengthen relationships and are core to Malaysian community living." },
                { q: "What is the cultural significance of family meals in Malaysia?", a: "Family meals are vital to Malaysian culture, where food is used to socialize, strengthen bonds, and teach traditions and values to younger generations." }
            ],
            "ethics": [
                { q: "What are the main values in Malaysian society?", a: "Malaysian society values respect, harmony, family, community, and tolerance across different cultures and religions." },
                { q: "How important is respect in Malaysia?", a: "Respect is very important, especially towards elders, teachers, and authority figures. Politeness and proper behavior are expected." },
                { q: "What is the role of family in Malaysian ethics?", a: "Family is central to Malaysian life, and individuals are expected to support and care for their family members." },
                { q: "Why is harmony valued in Malaysia?", a: "Harmony is valued because Malaysia is multicultural and multi-religious, so peaceful coexistence is essential." },
                { q: "How is honesty viewed in Malaysia?", a: "Honesty is considered an important personal value and is taught from a young age, both at home and in schools." },
                { q: "What is the role of religion in shaping ethics in Malaysia?", a: "Religion influences moral behavior, daily decisions, and societal expectations for many Malaysians." },
                { q: "How is community responsibility practiced in Malaysia?", a: "Malaysians are encouraged to help neighbors, participate in community events, and contribute to society's well-being." },
                { q: "Are there rules about public behavior in Malaysia?", a: "Yes. Modesty, respect, and consideration for others are expected in public, especially in religious or formal settings." },
                { q: "How is education related to ethics in Malaysia?", a: "Schools teach values such as discipline, respect, responsibility, and cooperation as part of character education." },
                { q: "Are Malaysian values influenced by culture?", a: "Yes. Values are influenced by Malay, Chinese, Indian, and indigenous cultures, creating a shared ethical framework." },
                { q: "How is respect for elders demonstrated in Malaysia?", a: "Elders are greeted politely, consulted in decisions, and given priority in social situations." },
                { q: "How are honesty and integrity promoted?", a: "Honesty and integrity are promoted through education, religious teachings, and community expectations." },
                { q: "What is the importance of tolerance in Malaysia?", a: "Tolerance allows different ethnic and religious groups to live together peacefully and maintain national unity." },
                { q: "How are Malaysian ethics reflected in everyday life?", a: "Ethics are reflected in manners, family interactions, community involvement, and workplace behavior." },
                { q: "Why are ethics and values important in Malaysian culture?", a: "Ethics and values maintain social harmony, guide personal behavior, and strengthen the nation's multicultural identity." },
                { q: "How do Malaysian ethics relate to customs and traditions?", a: "Malaysian ethics deeply inform customs and traditions. Values like respect, harmony, and family responsibility guide how people greet, celebrate, marry, and interact in all social and cultural practices." },
                { q: "What ethical values does Malaysia's cultural diversity reflect?", a: "Malaysia's multicultural society reflects ethical values of tolerance, coexistence, and mutual respect. The successful integration of Malay, Chinese, Indian, and indigenous communities demonstrates shared commitments to harmony and acceptance." },
                { q: "How do traditions teach ethical values to Malaysian youth?", a: "Traditions serve as vehicles for ethical education. Through participation in cultural ceremonies, family gatherings, and festivals, Malaysian youth learn values of respect, community responsibility, family loyalty, and cultural pride." }
            ]
        };

        // Smart Q&A Search Function
        const findAnswer = (userInput) => {
            const input = userInput.toLowerCase().trim();
            
            for (const [category, qaList] of Object.entries(MALAYSIA_QA_DATABASE)) {
                for (const item of qaList) {
                    const questionLower = item.q.toLowerCase();
                    // Exact or partial match
                    if (questionLower.includes(input) || input.length > 3 && questionLower.includes(input)) {
                        const categoryLabels = {
                            "language": "🗣️ Language of Malaysia",
                            "customs": "🎭 Customs & Traditions",
                            "arts": "🎨 Arts & Crafts",
                            "religion": "☪️ Beliefs & Religion",
                            "architecture": "🏛️ Traditional Architecture",
                            "attire": "👔 Traditional Attire",
                            "cuisine": "🍜 Traditional Cuisine",
                            "ethics": "⭐ Ethics & Values"
                        };
                        return { answer: item.a, category: categoryLabels[category] };
                    }
                }
            }
            
            return null;
        };

        const BOT_RESPONSES = {
            "hello": "Selamat Datang! I'm Maya, your AI guide to Malaysian culture. Ask me about language, customs, traditions, cuisine, arts, religion, architecture, attire, or ethics!",
            "bye": "Selamat tinggal! Hope to see you again soon.",
            "default": "That's a great question! Tell me more about Malaysia - ask me about language, customs, food, arts, religion, architecture, attire, ethics, or traditions."
        };

        // --- COMPONENTS ---

        const Modal = ({ isOpen, onClose, children, title }) => {
            if (!isOpen) return null;
            return (
                <div className="fixed inset-0 z-50 flex items-center justify-center p-4">
                    <motion.div 
                        initial={{ opacity: 0 }} animate={{ opacity: 1 }} exit={{ opacity: 0 }}
                        className="absolute inset-0 bg-black/80 backdrop-blur-sm" onClick={onClose}
                    />
                    <motion.div 
                        initial={{ scale: 0.9, y: 50, opacity: 0 }} animate={{ scale: 1, y: 0, opacity: 1 }}
                        className="relative bg-white dark:bg-zinc-900 w-full max-w-4xl rounded-3xl overflow-hidden shadow-2xl z-10 max-h-[90vh] flex flex-col"
                    >
                        <div className="p-6 border-b border-gray-100 flex justify-between items-center bg-gold/10">
                            <h2 className="text-2xl font-serif font-bold text-black">{title}</h2>
                            <button onClick={onClose} className="p-2 hover:bg-black/5 rounded-full"><Icons.X /></button>
                        </div>
                        <div className="p-0 overflow-y-auto flex-1 custom-scrollbar">
                            {children}
                        </div>
                    </motion.div>
                </div>
            );
        };

        const GameCongkak = () => {
            const [holes, setHoles] = useState(Array(14).fill(7));
            const [store, setStore] = useState([0, 0]);
            const [turn, setTurn] = useState(0); // 0 = Player, 1 = AI
            const [message, setMessage] = useState("Player 1's Turn! Pick a hole (0-6).");

            const play = (index) => {
                if (holes[index] === 0) return;
                let seeds = holes[index];
                let newHoles = [...holes];
                newHoles[index] = 0;
                let current = index;
                
                // Simple animation simulation logic (instant for now)
                let myStore = turn === 0 ? 0 : 1; // Not fully implementing full mancala logic for brevity, just a fun toy
                
                // Toy logic: Distribute seeds to next holes
                while(seeds > 0) {
                    current = (current + 1) % 14;
                    newHoles[current]++;
                    seeds--;
                }
                
                setHoles(newHoles);
                setStore(prev => {
                    const newStore = [...prev];
                    newStore[turn] += 1; // Bonus point for playing
                    return newStore;
                });
                setMessage(`Distributed seeds! ${seeds === 0 ? "Turn ended." : "Keep going!"}`);
                setTurn(turn === 0 ? 1 : 0);
            };

            return (
                <div className="p-8 bg-amber-50 min-h-[400px] flex flex-col items-center justify-center">
                    <div className="text-center mb-8">
                        <p className="text-xl font-mono text-amber-800 mb-2">{message}</p>
                        <div className="flex gap-12 text-2xl font-bold">
                            <div className="text-blue-600">You: {store[0]}</div>
                            <div className="text-red-600">Opponent: {store[1]}</div>
                        </div>
                    </div>
                    
                    <div className="bg-amber-800 p-6 rounded-full shadow-xl relative">
                        {/* Opponent Row (7-13) - reversed for display */}
                        <div className="flex gap-4 mb-4 justify-center">
                            {holes.slice(7, 14).reverse().map((seeds, i) => (
                                <button key={13-i} disabled={turn===0} onClick={() => play(13-i)}
                                    className="w-16 h-16 bg-amber-900 rounded-full flex items-center justify-center text-white shadow-inner hover:bg-amber-700 disabled:opacity-50 transition-all border-4 border-amber-700">
                                    {seeds}
                                </button>
                            ))}
                        </div>
                        
                        {/* Player Row (0-6) */}
                        <div className="flex gap-4 justify-center">
                            {holes.slice(0, 7).map((seeds, i) => (
                                <button key={i} disabled={turn===1} onClick={() => play(i)}
                                    className="w-16 h-16 bg-amber-900 rounded-full flex items-center justify-center text-white shadow-inner hover:bg-amber-700 disabled:opacity-50 transition-all border-4 border-amber-700">
                                    {seeds}
                                </button>
                            ))}
                        </div>
                        
                        {/* Stores */}
                        <div className="absolute left-[-80px] top-1/2 -translate-y-1/2 w-20 h-32 bg-amber-900 rounded-3xl flex items-center justify-center text-white text-2xl font-bold border-4 border-amber-700">{store[1]}</div>
                        <div className="absolute right-[-80px] top-1/2 -translate-y-1/2 w-20 h-32 bg-amber-900 rounded-3xl flex items-center justify-center text-white text-2xl font-bold border-4 border-amber-700">{store[0]}</div>
                    </div>
                </div>
            );
        };

        const GameBatu = () => {
            const [score, setScore] = useState(0);
            const [stoneState, setStoneState] = useState("ready"); // ready, thrown, catching
            
            const toss = () => {
                setStoneState("thrown");
                setTimeout(() => setStoneState("falling"), 500);
            };

            const catchStone = () => {
                if (stoneState === "falling") {
                    setScore(s => s + 1);
                    setStoneState("caught");
                    setTimeout(() => setStoneState("ready"), 800);
                } else {
                    setScore(0); // Fail reset
                    setStoneState("missed");
                    setTimeout(() => setStoneState("ready"), 800);
                }
            };

            return (
                <div className="p-12 bg-teal-50 min-h-[400px] flex flex-col items-center justify-center relative overflow-hidden">
                    <h3 className="text-2xl font-serif text-teal-900 mb-2">Score: {score}</h3>
                    <p className="mb-8 text-teal-700 font-mono">Click "TOSS", then click the stone when it turns GREEN!</p>
                    
                    <div className="h-64 w-full flex items-center justify-center relative">
                        <motion.button
                            onClick={stoneState === "ready" ? toss : catchStone}
                            animate={
                                stoneState === "thrown" ? { y: -150, scale: 0.8 } :
                                stoneState === "falling" ? { y: 0, scale: 1, backgroundColor: "#10b981" } :
                                stoneState === "caught" ? { scale: 1.5, opacity: 0 } :
                                { y: 0, scale: 1 }
                            }
                            className={`w-20 h-20 rounded-full shadow-lg z-10 transition-colors ${
                                stoneState === "missed" ? "bg-red-500" :
                                stoneState === "falling" ? "bg-green-500" : "bg-stone-500"
                            }`}
                        >
                            🪨
                        </motion.button>
                        
                        {stoneState === "ready" && (
                            <div className="absolute bottom-10 text-stone-400 font-bold animate-bounce">TOSS ME!</div>
                        )}
                    </div>
                </div>
            );
        };

        const Chatbot = () => {
            const [isOpen, setIsOpen] = useState(false);
            const [messages, setMessages] = useState([{ type: 'bot', text: BOT_RESPONSES.hello }]);
            const [input, setInput] = useState("");
            const chatEndRef = useRef(null);

            useEffect(() => {
                chatEndRef.current?.scrollIntoView({ behavior: 'smooth' });
            }, [messages]);

            const send = (e) => {
                e.preventDefault();
                if (!input.trim()) return;
                
                const userMsg = input.trim();
                const userMsgLower = userMsg.toLowerCase();
                setMessages(prev => [...prev, { type: 'user', text: userMsg }]);
                setInput("");

                setTimeout(() => {
                    let reply = '';
                    
                    if (userMsgLower.includes("hello") || userMsgLower.includes("hi")) {
                        reply = BOT_RESPONSES.hello;
                    } else if (userMsgLower.includes("bye") || userMsgLower.includes("goodbye")) {
                        reply = BOT_RESPONSES.bye;
                    } else {
                        const result = findAnswer(userMsg);
                        if (result) {
                            reply = `${result.category}\n\n${result.answer}`;
                        } else {
                            reply = BOT_RESPONSES.default;
                        }
                    }

                    setMessages(prev => [...prev, { type: 'bot', text: reply }]);
                }, 600);
            };

            return (
                <div className="fixed bottom-6 right-6 z-40 flex flex-col items-end">
                    <AnimatePresence>
                        {isOpen && (
                            <motion.div 
                                initial={{ opacity: 0, y: 20, scale: 0.9 }}
                                animate={{ opacity: 1, y: 0, scale: 1 }}
                                exit={{ opacity: 0, y: 20, scale: 0.9 }}
                                className="mb-4 w-80 md:w-96 bg-white rounded-2xl shadow-2xl border border-gold/20 overflow-hidden flex flex-col h-[500px]"
                            >
                                <div className="bg-gradient-to-r from-gold to-yellow-600 p-4 flex items-center gap-3">
                                    <div className="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center text-white">
                                        <Icons.Bot />
                                    </div>
                                    <div>
                                        <h3 className="font-bold text-white">Maya</h3>
                                        <p className="text-white/80 text-xs">AI Cultural Guide</p>
                                    </div>
                                    <button onClick={() => setIsOpen(false)} className="ml-auto text-white/80 hover:text-white"><Icons.X /></button>
                                </div>
                                
                                <div className="flex-1 p-4 overflow-y-auto bg-slate-50 space-y-4">
                                    {messages.map((m, i) => (
                                        <div key={i} className={`flex ${m.type === 'user' ? 'justify-end' : 'justify-start'}`}>
                                            <div className={`max-w-[80%] p-3 rounded-2xl text-sm ${
                                                m.type === 'user' 
                                                ? 'bg-black text-white rounded-tr-none' 
                                                : 'bg-white shadow-sm border border-gray-100 rounded-tl-none text-gray-800'
                                            }`}>
                                                {m.text}
                                            </div>
                                        </div>
                                    ))}
                                    <div ref={chatEndRef} />
                                </div>

                                <form onSubmit={send} className="p-3 bg-white border-t border-gray-100 flex gap-2">
                                    <input 
                                        value={input} 
                                        onChange={e => setInput(e.target.value)}
                                        placeholder="Ask about food, culture..." 
                                        className="flex-1 px-4 py-2 bg-gray-100 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-gold/50"
                                    />
                                    <button type="submit" className="w-10 h-10 bg-black text-gold rounded-full flex items-center justify-center hover:bg-gray-800 transition-colors">
                                        <Icons.Send />
                                    </button>
                                </form>
                            </motion.div>
                        )}
                    </AnimatePresence>
                    
                    <motion.button 
                        whileHover={{ scale: 1.1 }} whileTap={{ scale: 0.9 }}
                        onClick={() => setIsOpen(!isOpen)}
                        className="w-14 h-14 bg-black text-gold rounded-full shadow-lg flex items-center justify-center border-2 border-gold/30 hover:shadow-gold/20 transition-all"
                    >
                        {isOpen ? <Icons.X /> : <div className="relative"><Icons.Bot /><span className="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full animate-ping"></span></div>}
                    </motion.button>
                </div>
            );
        };

        // --- MAIN APP COMPONENT ---
        
        function App() {
            const [scrollY, setScrollY] = useState(0);
            const [activeModal, setActiveModal] = useState(null); // 'congkak', 'batu', 'heritage-xxx'
            
            // Quiz State
            const [quizStep, setQuizStep] = useState('start'); // start, playing, end
            const [quizName, setQuizName] = useState('');
            const [quizScore, setQuizScore] = useState(0);
            const [currentQ, setCurrentQ] = useState(0);
            const [leaderboard, setLeaderboard] = useState([]);

            useEffect(() => {
                const handleScroll = () => setScrollY(window.scrollY);
                window.addEventListener('scroll', handleScroll);
                // Load leaderboard
                const saved = localStorage.getItem('my_leaderboard');
                if (saved) setLeaderboard(JSON.parse(saved));
                return () => window.removeEventListener('scroll', handleScroll);
            }, []);

            useEffect(() => {
                // Initialize lucide icons
                lucide.createIcons();
            });

            const startQuiz = (e) => {
                e.preventDefault();
                if (quizName.trim()) {
                    setQuizStep('playing');
                    setQuizScore(0);
                    setCurrentQ(0);
                }
            };

            const answerQuiz = (index) => {
                if (index === MALAYSIA_DATA.quiz[currentQ].a) {
                    setQuizScore(s => s + 1);
                }
                
                if (currentQ < MALAYSIA_DATA.quiz.length - 1) {
                    setCurrentQ(q => q + 1);
                } else {
                    const newScore = quizScore + (index === MALAYSIA_DATA.quiz[currentQ].a ? 1 : 0);
                    // Finish
                    const entry = { name: quizName, score: newScore, date: new Date().toLocaleDateString() };
                    const newLb = [...leaderboard, entry].sort((a,b) => b.score - a.score).slice(0, 10);
                    setLeaderboard(newLb);
                    localStorage.setItem('my_leaderboard', JSON.stringify(newLb));
                    setQuizStep('end');
                }
            };

            const resetQuiz = () => {
                setQuizStep('start');
                setQuizName('');
                setQuizScore(0);
            };

            return (
                <div className="min-h-screen bg-bg-light relative overflow-x-hidden">
                    {/* Background Elements */}
                    <div className="fixed inset-0 z-0 pointer-events-none overflow-hidden">
                        <div className="absolute top-0 right-0 w-[500px] h-[500px] bg-gold/5 rounded-full blur-[100px] animate-blob" />
                        <div className="absolute bottom-0 left-0 w-[600px] h-[600px] bg-accent/5 rounded-full blur-[120px] animate-blob" style={{animationDelay: '2s'}} />
                        
                        {/* Flying Kite Animation */}
                        <div className="absolute top-20 right-[10%] opacity-20 animate-kite w-32 h-32">
                            <svg viewBox="0 0 100 100" className="w-full h-full fill-current text-gold">
                                <path d="M50 0 L100 50 L50 100 L0 50 Z" />
                            </svg>
                        </div>
                    </div>

                    {/* Navigation */}
                    <nav className={`fixed top-0 w-full z-40 transition-all duration-300 ${scrollY > 50 ? 'glass shadow-sm py-4' : 'bg-transparent py-6'}`}>
                        <div className="max-w-7xl mx-auto px-6 flex justify-between items-center">
                            <div className="flex items-center gap-2">
                                <div className="w-8 h-8 bg-gold rounded-lg rotate-45"></div>
                                <span className="text-xl font-bold font-serif tracking-tight ml-2">MY<span className="text-gold">Heritage</span></span>
                            </div>
                            <div className="hidden md:flex gap-8 font-mono text-sm">
                                <a href="#games" className="hover:text-gold transition-colors">GAMES</a>
                                <a href="#heritage" className="hover:text-gold transition-colors">HERITAGE</a>
                                <a href="#quiz" className="hover:text-gold transition-colors">QUIZ</a>
                                <a href="#gallery" className="hover:text-gold transition-colors">GALLERY</a>
                            </div>
                        </div>
                    </nav>

                    {/* HERO SECTION */}
                    <header className="relative min-h-screen flex items-center justify-center pt-20">
                        <div className="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
                            <motion.div initial={{ opacity: 0, x: -50 }} animate={{ opacity: 1, x: 0 }} transition={{ duration: 0.8 }}>
                                <div className="inline-block px-4 py-2 rounded-full bg-gold/10 text-gold font-mono text-xs tracking-widest mb-6">ASEAN AI BOOTH 2026</div>
                                <h1 className="text-6xl md:text-8xl font-serif font-bold leading-tight mb-6">
                                    Discover <br/>
                                    <span className="text-transparent bg-clip-text bg-gradient-to-r from-gold to-yellow-600">Malaysia</span>
                                </h1>
                                <p className="text-xl text-gray-600 mb-8 max-w-md font-light leading-relaxed">
                                    A journey through time, tradition, and technology. Experience the heart of Asia through immersive interactive showcases.
                                </p>
                                <a href="#games" className="inline-flex items-center gap-3 bg-black text-white px-8 py-4 rounded-full hover:bg-gold transition-colors group">
                                    <span>Start Exploring</span>
                                    <motion.span animate={{ x: [0, 5, 0] }} transition={{ repeat: Infinity, duration: 1.5 }}>
                                        <Icons.ChevronRight />
                                    </motion.span>
                                </a>
                            </motion.div>
                            <motion.div 
                                initial={{ opacity: 0, scale: 0.8 }} 
                                animate={{ opacity: 1, scale: 1 }} 
                                transition={{ duration: 1 }}
                                className="relative hidden md:block"
                            >
                                <div className="relative z-10 grid grid-cols-2 gap-4">
                                    <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?q=80&w=800" className="rounded-t-[100px] rounded-b-3xl shadow-2xl translate-y-12" />
                                    <img src="https://images.unsplash.com/photo-1596422846543-75c6fc197f07?q=80&w=800" className="rounded-t-3xl rounded-b-[100px] shadow-2xl" />
                                </div>
                                {/* Decorative circle */}
                                <div className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] border border-gold/30 rounded-full animate-spin-slow pointer-events-none" style={{animationDuration: '30s'}}></div>
                            </motion.div>
                        </div>
                    </header>

                    {/* GAMES SHOWCASE */}
                    <section id="games" className="py-24 bg-white relative">
                        <div className="max-w-7xl mx-auto px-6">
                            <div className="text-center mb-16">
                                <h2 className="text-4xl md:text-5xl font-serif font-bold mb-4">Traditional Games</h2>
                                <p className="text-gray-500">Play and experience the childhood games of Malaysia</p>
                            </div>
                            
                            <div className="grid md:grid-cols-2 gap-8">
                                {MALAYSIA_DATA.games.map((game, i) => (
                                    <motion.div 
                                        key={game.id}
                                        whileHover={{ y: -10 }}
                                        className="group relative rounded-3xl overflow-hidden cursor-pointer shadow-lg hover:shadow-2xl transition-all"
                                        onClick={() => setActiveModal(game.id)}
                                    >
                                        <div className={`absolute inset-0 bg-gradient-to-br ${game.color} opacity-90 transition-opacity group-hover:opacity-100`}></div>
                                        <div className="relative p-10 h-80 flex flex-col justify-between text-white">
                                            <div>
                                                <div className="flex justify-between items-start mb-4">
                                                    <span className="font-mono text-xs opacity-70 border border-white/30 px-3 py-1 rounded-full">{game.type}</span>
                                                    <Icons.Gamepad />
                                                </div>
                                                <h3 className="text-3xl font-bold font-serif">{game.title}</h3>
                                            </div>
                                            <div className="translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                                                <p className="mb-4 text-white/90 text-sm">{game.desc}</p>
                                                <span className="inline-flex items-center gap-2 font-bold text-sm">PLAY NOW <Icons.ChevronRight /></span>
                                            </div>
                                        </div>
                                        {/* Abstract Decoration */}
                                        <div className="absolute -bottom-10 -right-10 w-40 h-40 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform"></div>
                                    </motion.div>
                                ))}
                            </div>
                        </div>
                    </section>

                    {/* HERITAGE INSIGHTS */}
                    <section id="heritage" className="py-24 bg-cream relative">
                        <div className="max-w-7xl mx-auto px-6">
                            <h2 className="text-4xl md:text-5xl font-serif font-bold mb-12 text-center">Heritage Insights</h2>
                            
                            <div className="grid md:grid-cols-3 gap-8">
                                {MALAYSIA_DATA.heritage.map((category, i) => (
                                    <div key={category.id} className="space-y-6">
                                        <div className="flex items-center gap-3 mb-6">
                                            <span className="text-4xl">{category.icon}</span>
                                            <h3 className="text-2xl font-bold font-serif">{category.label}</h3>
                                        </div>
                                        
                                        {category.items.map((item, j) => (
                                            <motion.div 
                                                key={j}
                                                whileHover={{ scale: 1.02, backgroundColor: 'rgba(255,255,255,0.8)' }}
                                                className="bg-white p-6 rounded-2xl shadow-sm border border-gold/10 cursor-pointer group flex flex-col h-full justify-between"
                                                onClick={() => setActiveModal(`heritage-${category.id}-${j}`)}
                                            >
                                                <div>
                                                    <h4 className="font-bold text-lg mb-2 flex justify-between items-center">
                                                        {item.title}
                                                        <Icons.Info className="opacity-0 group-hover:opacity-100 text-gold transition-opacity" />
                                                    </h4>
                                                    <p className="text-gray-500 text-sm mb-4">{item.desc}</p>
                                                </div>
                                                <div className="text-gold font-bold text-sm uppercase tracking-wider flex items-center gap-2 mt-auto">
                                                    Read More <Icons.ChevronRight className="w-4 h-4" />
                                                </div>
                                            </motion.div>
                                        ))}
                                    </div>
                                ))}
                            </div>
                        </div>
                    </section>

                    {/* QUIZ ARENA */}
                    <section id="quiz" className="py-24 bg-black text-white relative overflow-hidden">
                        <div className="absolute inset-0 bg-gradient-to-br from-gray-900 to-black"></div>
                        <div className="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-gold to-transparent opacity-30"></div>
                        
                        <div className="max-w-4xl mx-auto px-6 relative z-10 text-center">
                            <span className="text-gold font-mono tracking-widest text-sm mb-4 block">KNOWLEDGE CHECK</span>
                            <h2 className="text-4xl md:text-5xl font-serif font-bold mb-12">Quiz Arena</h2>

                            {quizStep === 'start' && (
                                <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} className="bg-white/5 backdrop-blur-md p-10 rounded-3xl border border-white/10 max-w-md mx-auto">
                                    <h3 className="text-2xl font-bold mb-6">Ready to test your knowledge?</h3>
                                    <input 
                                        type="text" 
                                        placeholder="Enter your name" 
                                        value={quizName}
                                        onChange={(e) => setQuizName(e.target.value)}
                                        className="w-full bg-black/50 border border-white/20 rounded-xl px-4 py-3 text-white mb-6 focus:border-gold outline-none text-center"
                                    />
                                    <button 
                                        onClick={startQuiz}
                                        disabled={!quizName.trim()}
                                        className="w-full bg-gold text-black font-bold py-3 rounded-xl hover:bg-white transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                                    >
                                        START QUIZ
                                    </button>
                                    
                                    {leaderboard.length > 0 && (
                                        <div className="mt-8 pt-8 border-t border-white/10">
                                            <h4 className="text-sm font-mono text-gold mb-4">RECENT CHAMPIONS</h4>
                                            <div className="space-y-2 text-sm text-left">
                                                {leaderboard.slice(0, 3).map((entry, i) => (
                                                    <div key={i} className="flex justify-between items-center bg-white/5 p-2 rounded-lg">
                                                        <span>{i+1}. {entry.name}</span>
                                                        <span className="font-bold text-gold">{entry.score} pts</span>
                                                    </div>
                                                ))}
                                            </div>
                                        </div>
                                    )}
                                </motion.div>
                            )}

                            {quizStep === 'playing' && (
                                <div className="max-w-2xl mx-auto">
                                    <div className="flex justify-between items-center mb-8 text-sm font-mono text-gold">
                                        <span>QUESTION {currentQ + 1} / {MALAYSIA_DATA.quiz.length}</span>
                                        <span>SCORE: {quizScore}</span>
                                    </div>
                                    
                                    <motion.div 
                                        key={currentQ}
                                        initial={{ opacity: 0, x: 20 }} animate={{ opacity: 1, x: 0 }}
                                        className="bg-white/10 backdrop-blur-md p-8 rounded-3xl mb-8"
                                    >
                                        <h3 className="text-2xl font-bold mb-8">{MALAYSIA_DATA.quiz[currentQ].q}</h3>
                                        <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            {MALAYSIA_DATA.quiz[currentQ].options.map((opt, i) => (
                                                <button 
                                                    key={i}
                                                    onClick={() => answerQuiz(i)}
                                                    className="p-4 rounded-xl bg-white/5 hover:bg-gold hover:text-black border border-white/10 transition-all text-left"
                                                >
                                                    {opt}
                                                </button>
                                            ))}
                                        </div>
                                    </motion.div>
                                </div>
                            )}

                            {quizStep === 'end' && (
                                <motion.div initial={{ scale: 0.9 }} animate={{ scale: 1 }} className="bg-gradient-to-br from-gold/20 to-black p-10 rounded-3xl border border-gold/30">
                                    <Icons.Trophy className="w-16 h-16 text-gold mx-auto mb-6" />
                                    <h3 className="text-3xl font-bold mb-2">Quiz Complete!</h3>
                                    <p className="text-gray-300 mb-8">Great job, {quizName}!</p>
                                    
                                    <div className="text-6xl font-serif font-bold text-gold mb-8">{quizScore} <span className="text-2xl text-white">/ {MALAYSIA_DATA.quiz.length}</span></div>
                                    
                                    <button onClick={resetQuiz} className="bg-white text-black px-8 py-3 rounded-full font-bold hover:bg-gold transition-colors">
                                        PLAY AGAIN
                                    </button>

                                    {/* Leaderboard */}
                                    <div className="mt-12 max-w-md mx-auto">
                                        <h4 className="text-gold font-mono mb-4 border-b border-white/10 pb-2">LEADERBOARD</h4>
                                        <div className="space-y-3">
                                            {leaderboard.length === 0 ? (
                                                <p className="text-gray-500">No scores yet.</p>
                                            ) : (
                                                leaderboard.map((entry, i) => (
                                                    <div key={i} className="flex justify-between items-center bg-white/5 p-3 rounded-lg hover:bg-white/10 transition-colors">
                                                        <div className="flex items-center gap-3">
                                                            <span className={`w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold ${i < 3 ? 'bg-gold text-black' : 'bg-white/20'}`}>{i+1}</span>
                                                            <span>{entry.name}</span>
                                                        </div>
                                                        <span className="font-mono text-gold">{entry.score} pts</span>
                                                    </div>
                                                ))
                                            )}
                                        </div>
                                    </div>
                                </motion.div>
                            )}
                        </div>
                    </section>

                    {/* ART GALLERY CAROUSEL */}
                    <section id="gallery" className="py-24 bg-white overflow-hidden">
                         <div className="max-w-7xl mx-auto px-6 mb-12 text-center">
                            <h2 className="text-4xl md:text-5xl font-serif font-bold">Gallery</h2>
                        </div>
                        <div className="relative w-full overflow-hidden">
                            <motion.div 
                                className="flex gap-6 px-6"
                                animate={{ x: ["0%", "-50%"] }}
                                transition={{ repeat: Infinity, duration: 20, ease: "linear" }}
                                style={{ width: "fit-content" }}
                            >
                                {[...MALAYSIA_DATA.carousel, ...MALAYSIA_DATA.carousel].map((item, i) => (
                                    <div key={i} className="relative w-[300px] h-[400px] md:w-[400px] md:h-[500px] rounded-3xl overflow-hidden shrink-0 group">
                                        <img src={item.image} className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                                        <div className="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex flex-col justify-end p-8">
                                            <h3 className="text-white text-xl font-bold">{item.title}</h3>
                                            <p className="text-white/70 text-sm">{item.desc}</p>
                                        </div>
                                    </div>
                                ))}
                            </motion.div>
                        </div>
                    </section>

                    {/* FOOTER */}
                    <footer className="py-12 bg-white border-t border-gray-100">
                        <div className="max-w-7xl mx-auto px-6 text-center">
                            <h2 className="text-2xl font-serif font-bold mb-6">MY<span className="text-gold">Heritage</span></h2>
                            <p className="text-gray-500 mb-8 max-w-lg mx-auto">Celebrating the past, embracing the future. An interactive showcase of Malaysian pride.</p>
                            <div className="text-sm text-gray-400 font-mono">
                                © 2026 Malaysia AI Booth. Built for the future.
                            </div>
                        </div>
                    </footer>

                    {/* Chatbot */}
                    <Chatbot />

                    {/* MODALS */}
                    {activeModal && (
                        <Modal 
                            isOpen={!!activeModal} 
                            onClose={() => setActiveModal(null)}
                            title={activeModal.includes('heritage') 
                                ? MALAYSIA_DATA.heritage[activeModal.split('-')[1] === 'culture' ? 0 : activeModal.split('-')[1] === 'food' ? 1 : 2].items[activeModal.split('-')[2]].title 
                                : activeModal === 'congkak' ? 'Congkak Simulation' : 'Batu Seremban Challenge'}
                        >
                            {activeModal === 'congkak' && <GameCongkak />}
                            {activeModal === 'batu' && <GameBatu />}
                            {activeModal.includes('heritage') && (
                                <div className="p-8">
                                    <p className="text-xl leading-relaxed text-gray-700 mb-6">
                                        {MALAYSIA_DATA.heritage[activeModal.split('-')[1] === 'culture' ? 0 : activeModal.split('-')[1] === 'food' ? 1 : 2].items[activeModal.split('-')[2]].detail}
                                    </p>
                                    <div className="h-64 rounded-2xl overflow-hidden bg-gray-100">
                                        <img src={`https://source.unsplash.com/800x600/?malaysia,${activeModal.split('-')[1]}`} className="w-full h-full object-cover" />
                                    </div>
                                    <button className="mt-8 px-6 py-3 bg-gold text-white rounded-full font-bold hover:bg-black transition-colors" onClick={() => setActiveModal(null)}>Close Details</button>
                                </div>
                            )}
                        </Modal>
                    )}
                </div>
            );
        }

        const root = ReactDOM.createRoot(document.getElementById('root'));
        root.render(<App />);
    </script>
</body>
</html>