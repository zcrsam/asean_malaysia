import React from 'react';

function Home() {
    return (
        <div className="px-4 py-6 sm:px-0">
            <div className="border-2 border-dashed border-gray-300 rounded-lg p-8">
                <h2 className="text-2xl font-bold text-gray-900 mb-4">
                    Welcome to ASEAN Malaysia
                </h2>
                <p className="text-gray-600 mb-6">
                    This is a Laravel React application showcasing the integration between Laravel backend and React frontend.
                </p>
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div className="bg-white p-6 rounded-lg shadow">
                        <h3 className="text-lg font-semibold text-gray-900 mb-2">Laravel Backend</h3>
                        <p className="text-gray-600">Powerful PHP framework providing robust API endpoints and authentication.</p>
                    </div>
                    <div className="bg-white p-6 rounded-lg shadow">
                        <h3 className="text-lg font-semibold text-gray-900 mb-2">React Frontend</h3>
                        <p className="text-gray-600">Modern JavaScript library for building user interfaces with component-based architecture.</p>
                    </div>
                    <div className="bg-white p-6 rounded-lg shadow">
                        <h3 className="text-lg font-semibold text-gray-900 mb-2">Tailwind CSS</h3>
                        <p className="text-gray-600">Utility-first CSS framework for rapid UI development.</p>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Home;
