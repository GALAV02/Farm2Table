@extends('layouts.header')
@section('content')
    <div class="mx-auto max-w-screen-xl px-5 py-10">
        <div class="text-center mb-10">
            <h1 class="text-5xl font-extrabold text-teal-900">About Us</h1>
            <p class="text-lg text-teal-700 mt-3">Bringing Freshness Straight from the Farm to Your Table!</p>
        </div>

        <div class="mb-10">
            <h2 class="text-3xl font-bold text-teal-800 mb-4">Our Mission</h2>
            <p class="text-gray-700 text-lg">
                At Farm2Table, we are dedicated to connecting local farmers with our community. 
                We believe everyone deserves fresh, healthy, and sustainably grown produce. 
                Our mission is to make farm-fresh food accessible to everyone, one delivery at a time.
            </p>
        </div>

        <div class="mb-10">
            <h2 class="text-3xl font-bold text-teal-800 mb-4">Our Values</h2>
            <ul class="list-disc list-inside text-gray-700 text-lg space-y-2">
                <li>Freshness and Quality</li>
                <li>Sustainability</li>
                <li>Community Empowerment</li>
                <li>Transparency and Trust</li>
                <li>Supporting Local Farmers</li>
            </ul>

            <div class="text-gray-700 text-lg mt-4">
                <p class="mb-4">
                    These core values are the foundation of everything we do at Farm2Table. We believe that food should not only nourish the body, but also support ethical and sustainable practices.
                </p>
                <p>
                    From the soil to your doorstep, we prioritize honesty, collaboration, and care in every step of the journey. Join us in creating a better food system for everyone.
                </p>
            </div>
        </div>

        <div class="mb-10">
            <h2 class="text-3xl font-bold text-teal-800 mb-4">Meet the Team</h2>
            <div class="grid md:grid-cols-3 gap-8 mt-6">
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Alex Green" class="w-40 h-40 mx-auto rounded-full object-cover shadow-md" alt="Team Member" class="w-40 h-40 mx-auto rounded-full object-cover shadow-md">
                    <h3 class="text-xl font-semibold mt-4 text-teal-700">Unknown</h3>
                    <p class="text-gray-600">Founder & CEO</p>
                </div>
                <div class="text-center">
                    <img src="https://plus.unsplash.com/premium_photo-1689568126014-06fea9d5d341?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Team Member" class="w-40 h-40 mx-auto rounded-full object-cover shadow-md">
                    <h3 class="text-xl font-semibold mt-4 text-teal-700">Unknown</h3>
                    <p class="text-gray-600">Head of Operations</p>
                </div>
                <div class="text-center">
                    <img src="https://plus.unsplash.com/premium_photo-1689977807477-a579eda91fa2?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Team Member" class="w-40 h-40 mx-auto rounded-full object-cover shadow-md">
                    <h3 class="text-xl font-semibold mt-4 text-teal-700">Unknown</h3>
                    <p class="text-gray-600">Community Liaison</p>
                </div>
            </div>
        </div>

        <div class="mb-5">
            <h2 class="text-3xl font-bold text-teal-800 mb-4">Our Location</h2>
            <p class="text-lg text-gray-700 mb-4">Visit us or reach out from anywhere in the world!</p>
            <div class="w-full h-96 shadow-lg rounded-lg overflow-hidden">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d779.741823388494!2d84.40627401358975!3d27.70529649484126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3994fb6fdfd935ed%3A0x29e6424f203a7aec!2sLUMBINI%20ICT%20CAMPUS!5e1!3m2!1sen!2sus!4v1745308655164!5m2!1sen!2sus" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
@endsection
