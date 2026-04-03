import React from 'react';

function Welcome() {
    return (
        <div className="px-4 py-6 sm:px-0">
            <div className="border-2 border-dashed border-gray-300 rounded-lg p-8">
                <h2 className="text-2xl font-bold text-gray-900 mb-4">
                    Welcome Page
                </h2>
                <p className="text-gray-600 mb-6">
                    This is the welcome page converted from the original Blade template to React.
                </p>
                <div className="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <h3 className="text-lg font-semibold text-blue-900 mb-2">React Integration Complete</h3>
                    <p className="text-blue-800">
                        Your Laravel application has been successfully converted to use React as the frontend framework.
                    </p>
                </div>
            </div>
        </div>
    );
}

export default Welcome;
