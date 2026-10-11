
{{-- =========================================================
     AI APPOINTMENT ASSISTANT
========================================================= --}}

<section class="mb-8">
    <div class="relative overflow-hidden rounded-2xl border border-teal-100 bg-gradient-to-br from-white via-teal-50/40 to-cyan-50 shadow-sm">

        {{-- Background Decoration --}}
        <div class="absolute -right-16 -top-16 w-48 h-48 rounded-full bg-teal-500/10"></div>
        <div class="absolute -left-20 -bottom-20 w-56 h-56 rounded-full bg-cyan-500/10"></div>

        <div class="relative">

            {{-- Header --}}
            <div class="px-6 py-5 border-b border-teal-100">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-teal-600 to-cyan-600 text-white flex items-center justify-center shadow-md">
                            <i class="fa-solid fa-robot text-xl"></i>
                        </div>

                        <div>
                            <div class="flex items-center gap-2 flex-wrap">
                                <h3 class="text-lg sm:text-xl font-bold text-slate-800">
                                    AI Appointment Assistant
                                </h3>

                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-green-100 text-green-700 text-[10px] font-bold">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                    Online
                                </span>
                            </div>

                            <p class="text-sm text-slate-500 mt-1">
                                Book your OPD appointment using text or voice.
                            </p>
                        </div>
                    </div>

                    <div class="hidden sm:flex items-center gap-2 px-3 py-2 rounded-xl bg-white border border-slate-200 text-xs font-semibold text-slate-600">
                        <i class="fa-solid fa-wand-magic-sparkles text-teal-600"></i>
                        AI Powered
                    </div>

                </div>
            </div>

            {{-- Chat Area --}}
            <div class="p-6">

                <div id="aiChatMessages" class="space-y-4 max-h-[500px] overflow-y-auto pr-1">

                    {{-- Welcome Message --}}
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 w-9 h-9 rounded-xl bg-teal-600 text-white flex items-center justify-center">
                            <i class="fa-solid fa-robot text-sm"></i>
                        </div>

                        <div class="max-w-2xl">
                            <div class="rounded-2xl rounded-tl-md bg-white border border-slate-200 shadow-sm px-4 py-3">
                                <p class="text-sm text-slate-700 leading-relaxed">
                                    Hello, {{ $patient->user->name ?? 'Patient' }}! 👋
                                    <br>
                                    I can help you book an OPD appointment.
                                    <br>
                                    Type your request or use the microphone to speak in Bangla or English.
                                </p>
                            </div>

                            <p class="text-[11px] text-slate-400 mt-1 ml-1">
                                AI Appointment Assistant
                            </p>
                        </div>
                    </div>

                </div>

                {{-- Quick Prompts --}}
                <div class="mt-5">
                    <p class="text-xs font-semibold text-slate-500 mb-3">
                        Try asking
                    </p>

                    <div class="flex flex-wrap gap-2">

                        <button type="button" onclick="setAiPrompt('I want to book an OPD appointment')" class="ai-quick-prompt">
                            <i class="fa-solid fa-calendar-plus text-teal-600"></i>
                            Book an appointment
                        </button>

                        <button type="button" onclick="setAiPrompt('I need to see a doctor for fever')" class="ai-quick-prompt">
                            <i class="fa-solid fa-temperature-half text-red-500"></i>
                            I have fever
                        </button>

                        <button type="button" onclick="setAiPrompt('Show me available doctors')" class="ai-quick-prompt">
                            <i class="fa-solid fa-user-doctor text-blue-600"></i>
                            Available doctors
                        </button>

                        <button type="button" onclick="setAiPrompt('Show me available appointment slots')" class="ai-quick-prompt">
                            <i class="fa-solid fa-clock text-amber-600"></i>
                            Available slots
                        </button>

                    </div>
                </div>

                {{-- Appointment Form --}}
                <form id="aiAppointmentForm" method="POST" action="{{ route('patient.ai.appointment.prompt') }}" class="mt-5">
                    @csrf

                    <div class="rounded-2xl bg-white border border-slate-200 shadow-sm overflow-hidden">

                        <div class="p-3">

                            <div class="flex items-end gap-2">

                                {{-- Textarea --}}
                                <div class="flex-1 min-w-0">
                                    <label for="aiPrompt" class="sr-only">
                                        Appointment request
                                    </label>

                                    <textarea
                                        id="aiPrompt"
                                        name="prompt"
                                        rows="2"
                                        maxlength="2000"
                                        required
                                        placeholder="Type your message or tap the microphone to speak..."
                                        class="w-full resize-none border-0 focus:ring-0 focus:outline-none text-sm text-slate-700 placeholder-slate-400 bg-transparent"
                                    ></textarea>
                                </div>

                                {{-- Voice Input Button --}}
                                <button
                                    type="button"
                                    id="aiMicButton"
                                    class="flex-shrink-0 w-11 h-11 rounded-xl bg-slate-100 hover:bg-teal-100 text-teal-700 flex items-center justify-center transition shadow-sm"
                                    title="Speak your appointment request"
                                    aria-label="Start voice input"
                                >
                                    <i id="aiMicIcon" class="fa-solid fa-microphone"></i>
                                </button>

                                {{-- Send Button --}}
                                <button
                                    type="submit"
                                    id="aiSendButton"
                                    class="flex-shrink-0 w-11 h-11 rounded-xl bg-teal-600 hover:bg-teal-700 text-white flex items-center justify-center transition shadow-sm"
                                    title="Send message"
                                >
                                    <i id="aiSendIcon" class="fa-solid fa-paper-plane"></i>
                                </button>

                            </div>

                        </div>

                        {{-- Bottom Info --}}
                        <div class="px-4 py-2.5 bg-slate-50 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">

                            <p class="text-[11px] text-slate-400">
                                <i class="fa-solid fa-circle-info mr-1"></i>
                                Type or speak naturally in Bangla or English.
                            </p>

                            <p id="aiCharacterCount" class="text-[11px] text-slate-400">
                                0 / 2000
                            </p>

                        </div>

                    </div>

                    {{-- Voice Language --}}
                    <div class="mt-3 flex items-center gap-2 flex-wrap">

                        <label for="aiVoiceLanguage" class="text-[11px] text-slate-500">
                            <i class="fa-solid fa-language mr-1"></i>
                            Voice language:
                        </label>

                        <select
                            id="aiVoiceLanguage"
                            class="text-xs border border-slate-200 rounded-lg px-2 py-1 bg-white text-slate-700 focus:outline-none focus:ring-1 focus:ring-teal-500"
                        >
                            <option value="bn-BD" selected>বাংলা</option>
                            <option value="en-US">English</option>
                        </select>

                        <span
                            id="aiVoiceStatus"
                            class="text-xs text-teal-600"
                            aria-live="polite"
                        ></span>

                    </div>

                </form>

                {{-- Loading Indicator --}}
                <div id="aiLoading" class="hidden mt-4">
                    <div class="flex items-start gap-3">

                        <div class="w-9 h-9 rounded-xl bg-teal-600 text-white flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-robot text-sm"></i>
                        </div>

                        <div class="bg-white border border-slate-200 rounded-2xl rounded-tl-md px-4 py-3 shadow-sm">
                            <div class="flex items-center gap-2">

                                <span class="text-sm text-slate-500">
                                    AI is thinking
                                </span>

                                <span class="flex gap-1">
                                    <span class="w-1.5 h-1.5 bg-teal-500 rounded-full animate-bounce"></span>
                                    <span class="w-1.5 h-1.5 bg-teal-500 rounded-full animate-bounce" style="animation-delay: 0.15s"></span>
                                    <span class="w-1.5 h-1.5 bg-teal-500 rounded-full animate-bounce" style="animation-delay: 0.3s"></span>
                                </span>

                            </div>
                        </div>

                    </div>
                </div>

                {{-- Security Notice --}}
                <div class="mt-5 flex items-start gap-2">
                    <i class="fa-solid fa-shield-halved text-teal-600 text-xs mt-0.5"></i>

                    <p class="text-[11px] text-slate-400 leading-relaxed">
                        Your appointment will only be created after you confirm the selected doctor, date and available time slot.
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
    .ai-quick-prompt {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.6rem 0.8rem;
        border-radius: 0.75rem;
        background: white;
        border: 1px solid #e2e8f0;
        color: #475569;
        font-size: 0.75rem;
        font-weight: 600;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .ai-quick-prompt:hover {
        border-color: #99f6e4;
        background: #f0fdfa;
        color: #0f766e;
        transform: translateY(-1px);
    }

    .ai-quick-prompt:active {
        transform: translateY(0);
    }

    #aiPrompt {
        min-height: 52px;
        max-height: 140px;
        overflow-y: auto;
    }

    #aiPrompt::-webkit-scrollbar,
    #aiChatMessages::-webkit-scrollbar {
        width: 5px;
    }

    #aiPrompt::-webkit-scrollbar-track,
    #aiChatMessages::-webkit-scrollbar-track {
        background: transparent;
    }

    #aiPrompt::-webkit-scrollbar-thumb,
    #aiChatMessages::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }

    #aiMicButton:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    #aiMicButton.is-listening {
        background: #fee2e2;
        color: #dc2626;
        animation: aiMicPulse 1.5s infinite;
    }

    @keyframes aiMicPulse {
        0%, 100% {
            box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.15);
        }

        50% {
            box-shadow: 0 0 0 5px rgba(239, 68, 68, 0.08);
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('aiAppointmentForm');
        const prompt = document.getElementById('aiPrompt');
        const sendButton = document.getElementById('aiSendButton');
        const sendIcon = document.getElementById('aiSendIcon');
        const loading = document.getElementById('aiLoading');
        const chatMessages = document.getElementById('aiChatMessages');
        const characterCount = document.getElementById('aiCharacterCount');

        const micButton = document.getElementById('aiMicButton');
        const micIcon = document.getElementById('aiMicIcon');
        const voiceLanguage = document.getElementById('aiVoiceLanguage');
        const voiceStatus = document.getElementById('aiVoiceStatus');

        const SpeechRecognition =
            window.SpeechRecognition || window.webkitSpeechRecognition;

        let recognition = null;
        let isListening = false;
        let isSending = false;
        let originalText = '';
        let finalVoiceText = '';

        // Character Counter
        function updateCharacterCount() {
            characterCount.textContent = prompt.value.length + ' / 2000';
        }

        prompt.addEventListener('input', updateCharacterCount);

        // Enter to Send, Shift + Enter for New Line
        prompt.addEventListener('keydown', function (event) {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault();
                form.requestSubmit();
            }
        });

        // Escape HTML
        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        // Scroll Chat to Bottom
        function scrollChat() {
            requestAnimationFrame(function () {
                chatMessages.scrollTo({
                    top: chatMessages.scrollHeight,
                    behavior: 'smooth'
                });
            });
        }

        // Add User Message
        function addUserMessage(message) {
            const wrapper = document.createElement('div');
            wrapper.className = 'flex items-start gap-3 justify-end';

            wrapper.innerHTML = `
                <div class="max-w-2xl min-w-0">
                    <div class="rounded-2xl rounded-tr-md bg-teal-600 text-white px-4 py-3 shadow-sm">
                        <p class="text-sm leading-relaxed whitespace-pre-wrap break-words">${escapeHtml(message)}</p>
                    </div>
                    <p class="text-[11px] text-slate-400 mt-1 text-right mr-1">You</p>
                </div>
            `;

            chatMessages.appendChild(wrapper);
            scrollChat();
        }

        // Add AI Message
        function addAiMessage(message) {
            const wrapper = document.createElement('div');
            wrapper.className = 'flex items-start gap-3';

            wrapper.innerHTML = `
                <div class="flex-shrink-0 w-9 h-9 rounded-xl bg-teal-600 text-white flex items-center justify-center">
                    <i class="fa-solid fa-robot text-sm"></i>
                </div>
                <div class="max-w-3xl min-w-0">
                    <div class="rounded-2xl rounded-tl-md bg-white border border-slate-200 shadow-sm px-4 py-4 text-sm text-slate-700 leading-relaxed">
                        <div class="whitespace-pre-wrap break-words">${escapeHtml(message)}</div>
                    </div>
                    <p class="text-[11px] text-slate-400 mt-1 ml-1">AI Appointment Assistant</p>
                </div>
            `;

            chatMessages.appendChild(wrapper);
            scrollChat();
        }

        // Add Error Message
        function addErrorMessage(message) {
            const wrapper = document.createElement('div');
            wrapper.className = 'flex items-start gap-3';

            wrapper.innerHTML = `
                <div class="flex-shrink-0 w-9 h-9 rounded-xl bg-red-100 text-red-600 flex items-center justify-center">
                    <i class="fa-solid fa-circle-exclamation text-sm"></i>
                </div>
                <div class="max-w-3xl min-w-0">
                    <div class="rounded-2xl rounded-tl-md bg-red-50 border border-red-200 px-4 py-4 text-sm text-red-600 break-words">${escapeHtml(message)}</div>
                </div>
            `;

            chatMessages.appendChild(wrapper);
            scrollChat();
        }

        // Quick Prompt
        window.setAiPrompt = function (value) {
            if (isSending) return;

            if (isListening && recognition) {
                recognition.stop();
            }

            prompt.value = value;
            updateCharacterCount();
            prompt.focus();
        };

        // Voice Recognition Support
        if (!SpeechRecognition) {
            micButton.disabled = true;
            micButton.title = 'Voice input is not supported by this browser';

            voiceStatus.textContent =
                'Voice input is not supported. Please use a supported browser.';
        } else {
            recognition = new SpeechRecognition();

            recognition.continuous = true;
            recognition.interimResults = true;
            recognition.maxAlternatives = 1;

            // Start Listening
            recognition.onstart = function () {
                isListening = true;

                micIcon.className = 'fa-solid fa-stop';
                micButton.classList.add('is-listening');
                micButton.title = 'Stop voice input';

                voiceStatus.textContent =
                    'Listening... Speak now. Your words will appear below.';
            };

            // Convert Speech to Text
            recognition.onresult = function (event) {
                let interimTranscript = '';

                for (let i = event.resultIndex; i < event.results.length; i++) {
                    const transcript = event.results[i][0].transcript.trim();

                    if (event.results[i].isFinal) {
                        if (transcript) {
                            finalVoiceText +=
                                (finalVoiceText ? ' ' : '') + transcript;
                        }
                    } else {
                        interimTranscript +=
                            (interimTranscript ? ' ' : '') + transcript;
                    }
                }

                const spokenText = [finalVoiceText, interimTranscript]
                    .filter(Boolean)
                    .join(' ');

                prompt.value = [originalText, spokenText]
                    .filter(Boolean)
                    .join(originalText && spokenText ? ' ' : '');

                updateCharacterCount();

                if (interimTranscript) {
                    voiceStatus.textContent =
                        'Recognizing: ' + interimTranscript;
                } else if (finalVoiceText) {
                    voiceStatus.textContent =
                        'Voice text added. You can edit it before sending.';
                }

                scrollChat();
            };

            // Voice Recognition Error
            recognition.onerror = function (event) {
                const messages = {
                    'not-allowed': 'Please allow microphone access in your browser.',
                    'service-not-allowed': 'Speech recognition permission was denied.',
                    'no-speech': 'No speech detected. Please try again.',
                    'audio-capture': 'No microphone was detected.',
                    'network': 'Network error. Check your internet connection.',
                    'language-not-supported': 'This voice language is not supported.',
                    'aborted': 'Voice input stopped.'
                };

                voiceStatus.textContent =
                    messages[event.error] || 'Voice recognition failed. Please try again.';
            };

            // Stop Listening
            recognition.onend = function () {
                isListening = false;

                micIcon.className = 'fa-solid fa-microphone';
                micButton.classList.remove('is-listening');
                micButton.title = 'Speak your appointment request';

                if (finalVoiceText) {
                    voiceStatus.textContent =
                        'Voice text ready. Edit it or send your message.';
                } else if (voiceStatus.textContent.startsWith('Listening')) {
                    voiceStatus.textContent = 'Voice input stopped.';
                }
            };

            // Microphone Button
            micButton.addEventListener('click', function () {
                if (isSending) return;

                if (isListening) {
                    recognition.stop();
                    return;
                }

                originalText = prompt.value.trim();
                finalVoiceText = '';

                recognition.lang = voiceLanguage.value;

                try {
                    recognition.start();
                } catch (error) {
                    voiceStatus.textContent =
                        'Unable to start microphone. Please try again.';
                }
            });
        }

        // Submit Appointment Request to Laravel
        form.addEventListener('submit', async function (event) {
            event.preventDefault();

            if (isSending) return;

            const promptValue = prompt.value.trim();

            if (!promptValue) {
                prompt.focus();
                return;
            }

            if (isListening && recognition) {
                recognition.stop();
            }

            isSending = true;

            const formData = new FormData(form);

            addUserMessage(promptValue);

            prompt.value = '';
            updateCharacterCount();

            sendButton.disabled = true;
            sendButton.classList.add('opacity-60', 'cursor-not-allowed');
            sendIcon.className = 'fa-solid fa-spinner fa-spin';

            micButton.disabled = true;
            loading.classList.remove('hidden');

            voiceStatus.textContent = '';

            scrollChat();

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(
                        data.message || 'Something went wrong. Please try again.'
                    );
                }

                addAiMessage(
                    data.message || data.response || 'I received your request.'
                );
            } catch (error) {
                addErrorMessage(
                    error.message || 'Something went wrong. Please try again.'
                );

                // Restore the request so the user does not lose their message.
                prompt.value = promptValue;
                updateCharacterCount();
            } finally {
                isSending = false;

                loading.classList.add('hidden');

                sendButton.disabled = false;
                sendButton.classList.remove('opacity-60', 'cursor-not-allowed');
                sendIcon.className = 'fa-solid fa-paper-plane';

                micButton.disabled = !SpeechRecognition;

                prompt.focus();
                scrollChat();
            }
        });
    });
</script>
