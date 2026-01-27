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

        { margin: 0; padding: 0; box-sizing: border-box; scroll-behavior: smooth; }

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

        h1,
        h2,
        h3,
        h4,
        .serif {
            font-family: 'Playfair Display', serif;
        }

        .mono {
            font-family: 'DM Mono', monospace;
        }

        .glass {
            background: rgba(255, 253, 251, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(201, 169, 97, 0.1);
        }

        .glass-dark {
            background: rgba(15, 15, 15, 0.9);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .gold-glow {
            box-shadow: 0 0 40px rgba(201, 169, 97, 0.15);
        }

        .text-gradient {
            background: linear-gradient(135deg, var(--gold) 0%, #B8860B 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Custom Animations */
        @keyframes float-kite {
            0%,
            100% {
                transform: translate(0, 0) rotate(5deg);
            }

            50% {
                transform: translate(-20px, -30px) rotate(-5deg);
            }
        }

        .animate-kite {
            animation: float-kite 8s ease-in-out infinite;
        }

        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 10s infinite;
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
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

    @verbatim

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
                {
  id: 'culture',
  label: 'Culture',
  icon: '🎭',
  items: [
    {
      title: "Batik Painting",
      desc: "Traditional wax-resist dyeing art.",
      detail:
        "Malaysian Batik features bold floral and geometric motifs with vibrant colors. Unlike Javanese Batik, it is often hand-painted without repetitive patterns and widely worn during official events.",
      extra:
        "Batik is recognized as part of Malaysia’s national heritage and commonly used for shirts, dresses, and sarongs.",
      image: "/assets/culture/batik.jpeg"
    },
    {
      title: "Wayang Kulit",
      desc: "Traditional shadow puppet theater.",
      detail:
        "Wayang Kulit is an ancient storytelling performance using intricately carved leather puppets. Stories often come from Hindu epics like the Ramayana.",
      extra:
        "Performed with live Gamelan music, it can last several hours and is especially popular in Kelantan.",
      image: "/assets/culture/wayang_kulit.jpeg"
    },
    {
      title: "Wau Bulan",
      desc: "Traditional Malaysian moon kite.",
      detail:
        "Wau Bulan is a large, beautifully decorated kite flown after the rice harvest season.",
      extra:
        "It appears on the Malaysian 50 sen coin and symbolizes creativity, patience, and craftsmanship.",
      image: "/assets/culture/wau-bulan.jpeg"
    }
  ]
},
{
  id: 'food',
  label: 'Culinary',
  icon: '🍜',
  items: [
    {
      title: "Nasi Lemak",
      desc: "Rice cooked in coconut milk.",
      detail:
        "Malaysia’s national dish, known for its fragrant rice and spicy sambal.",
      extra:
        "Traditionally wrapped in banana leaves and eaten for breakfast, but now enjoyed all day with chicken, rendang, or seafood.",
      image: "/assets/food/nasi-lemak.jpeg"
    },
    {
      title: "Satay",
      desc: "Grilled skewered meat with peanut sauce.",
      detail:
        "Marinated meat grilled over charcoal, giving it a smoky, juicy flavor.",
      extra:
        "Kajang Satay is the most famous, often served during festivals and gatherings.",
      image: "/assets/food/satay.jpeg"
    },
    {
      title: "Teh Tarik",
      desc: "Frothy pulled milk tea.",
      detail:
        "Made by pouring tea back and forth to cool it and create foam.",
      extra:
        "A symbol of Malaysian social culture, commonly enjoyed at mamak stalls late into the night.",
      image: "/assets/food/teh-tarik.jpeg"
    }
  ]
},
{
  id: 'nature',
  label: 'Nature',
  icon: '🌴',
  items: [
    {
      title: "Taman Negara",
      desc: "One of the world’s oldest rainforests.",
      detail:
        "Estimated to be over 130 million years old, older than the Amazon rainforest.",
      extra:
        "Features canopy walks, river safaris, and rare wildlife like Malayan tigers and tapirs.",
      image: "/assets/nature/taman-negara.jpeg"
    },
    {
      title: "Mount Kinabalu",
      desc: "Highest mountain in Malaysia.",
      detail:
        "A UNESCO World Heritage Site located in Sabah.",
      extra:
        "Known for its unique biodiversity and sunrise summit views. Popular among climbers worldwide.",
      image: "/assets/nature/mount-kinabalu.jpeg"
    },
    {
      title: "Sipadan Island",
      desc: "Legendary scuba diving destination.",
      detail:
        "Famous for crystal-clear waters and rich marine biodiversity.",
      extra:
        "Divers can witness sea turtles, hammerhead sharks, and massive schools of barracuda.",
      image: "/assets/nature/sipadan.jpeg"
    }
  ]

}               
            ],
            quiz: [
                { q: "What is the national flower of Malaysia?", options: ["Orchid", "Hibiscus", "Rose", "Sunflower"], a: 1 },
                { q: "Which year did Malaysia achieve independence?", options: ["1963", "1946", "1957", "1990"], a: 2 },
                { q: "What is the tallest twin tower in the world?", options: ["KL Tower", "Merdeka 118", "Petronas Twin Towers", "Exchange 106"], a: 2 },
                { q: "Where is the historic city of Melaka located?", options: ["North", "East Coast", "West Coast", "Borneo"], a: 2 },
                { q: "Which state is known for 'Nasi Kandar'?", options: ["Johor", "Penang", "Perak", "Selangor"], a: 1 }
            ],
            carousel: [
  // 🎭 Culture
  {
    image: "/assets/culture/batik.jpeg",
    title: "Batik Painting",
    desc: "Traditional wax-resist dyeing art"
  },
  {
    image: "/assets/culture/wayang_kulit.jpeg",
    title: "Wayang Kulit",
    desc: "Traditional shadow puppet theater"
  },
  {
    image: "/assets/culture/wau-bulan.jpeg",
    title: "Wau Bulan",
    desc: "Traditional Malaysian moon kite"
  },

  // 🍜 Food
  {
    image: "/assets/food/nasi-lemak.jpeg",
    title: "Nasi Lemak",
    desc: "Malaysia’s iconic coconut rice dish"
  },
  {
    image: "/assets/food/satay.jpeg",
    title: "Satay",
    desc: "Grilled skewered meat with peanut sauce"
  },
  {
    image: "/assets/food/teh-tarik.jpeg",
    title: "Teh Tarik",
    desc: "Frothy pulled milk tea"
  },

  // 🌴 Nature
  {
    image: "/assets/nature/taman-negara.jpeg",
    title: "Taman Negara",
    desc: "One of the world’s oldest rainforests"
  },
  {
    image: "/assets/nature/mount-kinabalu.jpeg",
    title: "Mount Kinabalu",
    desc: "Highest mountain in Malaysia"
  },
  {
    image: "/assets/nature/sipadan.jpeg",
    title: "Sipadan Island",
    desc: "World-class scuba diving destination"
  }
],

        };

        // Comprehensive Malaysia Q&A Database
        const MALAYSIA_QA_DATABASE = {
            "language": [
                { q: "What is the official language of Malaysia?", a: "The official language of Malaysia is Malay or Bahasa Malaysia. The Article 152 of the Federal Constitution explains that Bahasa Malaysia is an official language whose function and role as the National Language cannot be disputed. The Malay language is a significant linguistic medium in Southeast Asia, serving as the national language in Malaysia, Indonesia, Brunei, and Singapore." },
                { q: "What is Bahasa Malaysia also commonly called?", a: "Bahasa Malaysia is also commonly referred to as Bahasa Melayu." },
                { q: "How many indigenous languages are spoken in Malaysia?", a: "Malaysia is also home to an impressive number of indigenous languages. 137 indigenous languages are spoken in various parts of the country." },
                { q: "Which writing system is used for Bahasa Malaysia today?", a: "The primary writing system used for Bahasa Malaysia (the Malay language) today is the Latin script, which is known locally as Rumi." },
                { q: "Was a different script used historically for Malay?", a: "Yes. Historically, the Jawi script, originating from the Arabic script, was utilized for writing the Malay language across the Malay Archipelago, including Singapore, serving as the primary script for various written materials." },
                { q: "Is English widely spoken in Malaysia?", a: "Yes. English is widely spoken, especially in business, education, and urban areas." },
                { q: "Are there other languages spoken in Malaysia besides Malay and English?", a: "Yes. Many Malaysians also speak Chinese languages (such as Mandarin, Cantonese, and Hokkien), Tamil, and various indigenous languages." },
                { q: "Why is Malaysia considered a multilingual country?", a: "Malaysia is multilingual due to its diverse ethnic groups, historical trade, and colonial influences." },
                { q: "Which indigenous languages are most widely spoken in Malaysia?", a: "In the states of Sabah and Sarawak on the island of Borneo, the dominant languages that cut across ethnic boundaries are Kadazan-Dusun and Iban." },
                { q: "Does Bahasa Malaysia use verb conjugation?", a: "No. Bahasa Malaysia does not use verb conjugation to show tense. Time is usually indicated using context or time-related words." }
            ],
            "customs": [
                { q: "What are Malaysian customs and traditions?", a: "Malaysian customs and traditions reflect the country's diverse ethnic groups, including Malay, Chinese, Indian, and indigenous communities, and emphasize respect, harmony, and community living." },
                { q: "Why is Malaysia culturally diverse?", a: "Malaysia is culturally diverse because it is home to many ethnic groups with different religions, languages, and historical backgrounds." },
                { q: "How do Malaysians usually greet each other?", a: "Malaysians generally greet each other politely with a handshake. Some people place their hand over their heart as a sign of respect." },
                { q: "Why is the right hand important in Malaysian culture?", a: "The right hand is traditionally used for eating, giving, and receiving items, as it is considered more polite." },
                { q: "How are elders treated in Malaysian society?", a: "Elders are highly respected, and people are expected to speak and behave politely toward them." }
            ],
            "arts": [
                { q: "What are traditional arts and crafts in Malaysia?", a: "Traditional Malaysian arts and crafts include textiles, woodcarving, metalwork, pottery, and weaving, reflecting the country's cultural diversity." },
                { q: "What is batik and why is it important in Malaysia?", a: "Batik is a traditional fabric art made using wax and dye. It is an important part of Malaysian cultural identity and is commonly worn for formal and casual occasions." },
                { q: "What is songket?", a: "Songket is a handwoven fabric decorated with gold or silver threads, traditionally worn during ceremonies and special events." },
                { q: "What materials are commonly used in Malaysian crafts?", a: "Common materials include cotton, silk, bamboo, rattan, wood, clay, and metal." }
            ],
            "religion": [
                { q: "What are the main religions practiced in Malaysia?", a: "The main religions in Malaysia are Islam, Buddhism, Christianity, Hinduism, and traditional indigenous beliefs." },
                { q: "What is the official religion of Malaysia?", a: "Islam is the official religion of Malaysia, as stated in the Constitution." },
                { q: "Can people in Malaysia practice other religions freely?", a: "Yes. The Constitution allows people to practice other religions in peace and harmony." }
            ],
            "cuisine": [
                { q: "What is traditional Malaysian cuisine?", a: "Traditional Malaysian cuisine is a mix of Malay, Chinese, Indian, and indigenous cooking styles, known for its rich flavors and use of spices and herbs." },
                { q: "What are common ingredients used in Malaysian food?", a: "Common ingredients include rice, noodles, coconut milk, chili, spices, herbs, seafood, chicken, and beef." },
                { q: "What is nasi lemak?", a: "Nasi lemak is a popular Malaysian dish made of rice cooked in coconut milk, usually served with sambal, anchovies, peanuts, and egg." }
            ]
        };

        // Smart Q&A Search Function
        const findAnswer = (userInput) => {
            const input = userInput
            .toLowerCase().trim();

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
                            "cuisine": "🍜 Traditional Cuisine"
                        };
                        return { answer: item.a, category: categoryLabels[category] };
                    }
                }
            }
            return null;
        };

        const BOT_RESPONSES = {
            "hello": "Selamat Datang! I'm Maya, your AI guide to Malaysian culture. Ask me about language, customs, traditions, cuisine, arts, or religion!",
            "bye": "Selamat tinggal! Hope to see you again soon.",
            "default": "That's a great question! Tell me more about Malaysia - ask me about language, customs, food, arts, religion, or traditions."
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
                        <div className="absolute bottom-0 left-0 w-[600px] h-[600px] bg-accent/5 rounded-full blur-[120px] animate-blob" style={{ animationDelay: '2s' }} />
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
                                    Discover <br />
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
                                <img src="/assets/malaysia2.jpeg"
                                className="rounded-t-[100px] rounded-b-3xl shadow-2xl translate-y-12"
                                alt="" />
                                <img src="/assets/malaysia1.jpeg"
                                className="rounded-t-3xl rounded-b-[100px] shadow-2xl"
                                alt="" />
                            </div>

                                {/* Decorative circle */}
                                <div className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] border border-gold/30 rounded-full animate-spin-slow pointer-events-none" style={{ animationDuration: '30s' }}></div>
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
    <h2 className="text-4xl md:text-5xl font-serif font-bold mb-12 text-center">
      Heritage Insights
    </h2>

    <div className="grid md:grid-cols-3 gap-10">
      {MALAYSIA_DATA.heritage.map((category) => (
        <div key={category.id} className="space-y-6">
          {/* Category header */}
          <div className="flex items-center gap-3 mb-6">
            <span className="text-4xl">{category.icon}</span>
            <h3 className="text-2xl font-bold font-serif">
              {category.label}
            </h3>
          </div>

          {category.items.map((item, j) => (
            <motion.div
              key={j}
              whileHover={{ scale: 1.02 }}
              className="group bg-white rounded-2xl shadow-sm border border-gold/10 cursor-pointer overflow-hidden"
              onClick={() => setActiveModal(`heritage-${category.id}-${j}`)}
            >
              {/* Image preview */}
              <div className="h-40 w-full overflow-hidden">
                <img
                  src={item.image}
                  alt={item.title}
                  className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                />
              </div>

              {/* Content */}
              <div className="p-6 flex flex-col h-full">
                <h4 className="font-bold text-lg mb-2 flex justify-between items-center">
                  {item.title}
                  <Icons.Info className="opacity-0 group-hover:opacity-100 text-gold transition-opacity" />
                </h4>

                <p className="text-gray-500 text-sm mb-4">
                  {item.desc}
                </p>

                {/* Extra hint */}
                {item.extra && (
                  <p className="text-gray-400 text-xs line-clamp-2 mb-4">
                    {item.extra}
                  </p>
                )}

                <div className="mt-auto text-gold font-bold text-sm uppercase tracking-wider flex items-center gap-2">
                  Read More <Icons.ChevronRight className="w-4 h-4" />
                </div>
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
    <span className="text-gold font-mono tracking-widest text-sm mb-4 block">
      KNOWLEDGE CHECK
    </span>
    <h2 className="text-4xl md:text-5xl font-serif font-bold mb-12">
      Quiz Arena
    </h2>

    {/* START */}
    {quizStep === 'start' && (
      <motion.div
        initial={{ opacity: 0, y: 20 }}
        animate={{ opacity: 1, y: 0 }}
        className="bg-white/5 backdrop-blur-md p-10 rounded-3xl border border-white/10 max-w-md mx-auto"
      >
        <h3 className="text-2xl font-bold mb-6">
          Ready to test your knowledge?
        </h3>

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

        {/* RECENT CHAMPIONS */}
        {leaderboard.length > 0 && (
          <div className="mt-8 pt-8 border-t border-white/10">
            <h4 className="text-sm font-mono text-gold mb-4">
              RECENT CHAMPIONS
            </h4>

            <div className="space-y-2 text-sm text-left">
              {leaderboard.slice(0, 3).map((entry, i) => (
                <div
                  key={i}
                  className="flex justify-between items-center bg-white/5 p-2 rounded-lg"
                >
                  <span>{i + 1}. {entry.name}</span>
                  <span className="font-bold text-gold">
                    {entry.score} pts
                  </span>
                </div>
              ))}
            </div>

            {/* RESET LEADERBOARD */}
            <button
              onClick={() => setLeaderboard([])}
              className="mt-4 text-xs font-mono text-gray-400 hover:text-gold transition-colors"
            >
              RESET LEADERBOARD
            </button>
          </div>
        )}
      </motion.div>
    )}

    {/* PLAYING */}
    {quizStep === 'playing' && (
      <div className="max-w-2xl mx-auto">
        <div className="flex justify-between items-center mb-8 text-sm font-mono text-gold">
          <span>
            QUESTION {currentQ + 1} / {MALAYSIA_DATA.quiz.length}
          </span>
          <span>SCORE: {quizScore}</span>
        </div>

        <motion.div
          key={currentQ}
          initial={{ opacity: 0, x: 20 }}
          animate={{ opacity: 1, x: 0 }}
          className="bg-white/10 backdrop-blur-md p-8 rounded-3xl mb-8"
        >
          <h3 className="text-2xl font-bold mb-8">
            {MALAYSIA_DATA.quiz[currentQ].q}
          </h3>

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

    {/* END */}
    {quizStep === 'end' && (
      <motion.div
        initial={{ scale: 0.9 }}
        animate={{ scale: 1 }}
        className="bg-gradient-to-br from-gold/20 to-black p-10 rounded-3xl border border-gold/30"
      >
        <Icons.Trophy className="w-16 h-16 text-gold mx-auto mb-6" />

        <h3 className="text-3xl font-bold mb-2">
          Quiz Complete!
        </h3>

        <p className="text-gray-300 mb-8">
          Great job, {quizName}!
        </p>

        <div className="text-6xl font-serif font-bold text-gold mb-8">
          {quizScore}
          <span className="text-2xl text-white">
            {' '} / {MALAYSIA_DATA.quiz.length}
          </span>
        </div>

        <button
          onClick={resetQuiz}
          className="bg-white text-black px-8 py-3 rounded-full font-bold hover:bg-gold transition-colors"
        >
          PLAY AGAIN
        </button>

        {/* RESET LEADERBOARD */}
        <button
          onClick={() => setLeaderboard([])}
          className="mt-4 block mx-auto text-sm font-mono text-gray-300 hover:text-gold transition-colors"
        >
          Reset Leaderboard
        </button>

        {/* LEADERBOARD */}
        <div className="mt-12 max-w-md mx-auto">
          <h4 className="text-gold font-mono mb-4 border-b border-white/10 pb-2">
            LEADERBOARD
          </h4>

          <div className="space-y-3">
            {leaderboard.length === 0 ? (
              <p className="text-gray-500">
                No scores yet.
              </p>
            ) : (
              leaderboard.map((entry, i) => (
                <div
                  key={i}
                  className="flex justify-between items-center bg-white/5 p-3 rounded-lg hover:bg-white/10 transition-colors"
                >
                  <div className="flex items-center gap-3">
                    <span
                      className={`w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold ${
                        i < 3
                          ? 'bg-gold text-black'
                          : 'bg-white/20'
                      }`}
                    >
                      {i + 1}
                    </span>
                    <span>{entry.name}</span>
                  </div>
                  <span className="font-mono text-gold">
                    {entry.score} pts
                  </span>
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
                            {activeModal?.includes('heritage') && (() => {
  const [, category, index] = activeModal.split('-');

  const categoryIndex =
    category === 'culture' ? 0 :
    category === 'food' ? 1 : 2;

  const item = MALAYSIA_DATA.heritage[categoryIndex].items[index];

  return (
    <div className="p-8">
      <p className="text-xl leading-relaxed text-gray-700 mb-4">
        {item.detail}
      </p>

      {item.extra && (
        <p className="text-base text-gray-600 mb-6">
          {item.extra}
        </p>
      )}

      <div className="h-64 rounded-2xl overflow-hidden bg-gray-100 shadow-lg">
        <img
          src={item.image}
          alt={item.title}
          className="w-full h-full object-cover"
        />
      </div>

      <button
        className="mt-8 px-6 py-3 bg-gold text-white rounded-full font-bold hover:bg-black transition-colors"
        onClick={() => setActiveModal(null)}
      >
        Close Details
      </button>
    </div>
  );
})()}

                        </Modal>
                    )}
                </div>
            );
        }

        const root = ReactDOM.createRoot(document.getElementById('root'));
        root.render(<App />);
    </script>

    @endverbatim
</body>

</html>
