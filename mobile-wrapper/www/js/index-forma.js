/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.

 */
let app = {
    permissions: null,
    // Application Constructor
    initialize: function () {
        this.bindEvents();
    },
    // Bind Event Listeners
    //
    // Bind any events that are required on startup. Common events are:
    // 'load', 'deviceready', 'offline', and 'online'.
    bindEvents: function () {
        document.addEventListener('deviceready', this.onDeviceReady, false);
    },
    // deviceready Event Handler
    //
    // The scope of 'this' is the event. In order to call the 'receivedEvent'
    // function, we must explicitly call 'app.receivedEvent(...);'
    onDeviceReady: function () {

        // Language and country by default
        let config = {
            'language': 'ru',
            'country': 'RU'
        }

        let client = window.navigator ? (window.navigator.language ||
            window.navigator.systemLanguage ||
            window.navigator.userLanguage) : (config.language + "-" + config.country);

        app.language = (client.search('-') > 0) ?
            client.substring(0, client.search('-')).toLowerCase() :
            client.toLowerCase();

        app.country = (client.search('-') > 0) ?
            client.substring(client.search('-') + 1, client.length).toLowerCase() :
            config.country;

        //CLICK LOAD
        $(document).on('click', '.load', function (e) {
            e.preventDefault();
            var $this = $(this);
            var target = $this.data('inAppBrowser') || '_blank';
            window.open($this.attr('href'), target, 'location=no,zoom=no');
        });

        //PERMIS

        //plugins ready
        app.permissions = cordova.plugins.permissions;
        //add button listeners
        document.getElementById('btnGeo').addEventListener('click', app.geoPerm);
        app.geoPerm();

        /*let id = 'xx';
        if (device.platform == "Android") {
            window.open('googlechrome://navigate?url=https://ingello.com/?push=1', "_system")
        } else
            window.open('https://ingello.com/?push=1&id=' + id, '_blank', 'location=no');
        */
        cordova.InAppBrowser.open('https://forma.ingello.com/?language=' + app.language + '&country=' + app.country, '_self', 'location=no,zoom=no');

        app.receivedEvent('deviceready');
    },

    geoPerm: function () {
        
    },

    // Update DOM on a Received Event
    receivedEvent: function (id) {
        var parentElement = document.getElementById(id);
        var listeningElement = parentElement.querySelector('.listening');
        var receivedElement = parentElement.querySelector('.received');

        listeningElement.setAttribute('style', 'display:none;');
        receivedElement.setAttribute('style', 'display:block;');

        console.log('Received Event: ' + id);
    }
};

app.initialize();
