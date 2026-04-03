import React from 'react';
import { Routes, Route } from 'react-router-dom';
import Home from './pages/Home';
import Welcome from './pages/Welcome';
import Layout from './Layout';

function App() {
    return (
        <Layout>
            <Routes>
                <Route path="/" element={<Home />} />
                <Route path="/welcome" element={<Welcome />} />
            </Routes>
        </Layout>
    );
}

export default App;
