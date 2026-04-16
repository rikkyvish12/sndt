<!-- Floating Chatbot Widget -->
<div id="chatbot-widget" @if(isset($departmentId)) data-department-id="{{ $departmentId }}" @endif>
    <!-- Chatbot Toggle Button -->
    <button id="chatbot-toggle" class="chatbot-toggle-btn" aria-label="Open chat">
        <svg id="chatbot-icon" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
        </svg>
        <svg id="close-icon" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: none;">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
        <span class="chatbot-badge" id="chatbot-badge">1</span>
    </button>

    <!-- Chatbot Window -->
    <div id="chatbot-window" class="chatbot-window">
        <!-- Chatbot Header -->
        <div class="chatbot-header">
            <div class="chatbot-header-content">
                <div class="chatbot-avatar">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="chatbot-title">PV Polytechnic Assistant</h4>
                    <p class="chatbot-status">Online</p>
                </div>
            </div>
        </div>

        <!-- Chatbot Messages -->
        <div id="chatbot-messages" class="chatbot-messages">
            <div class="message bot-message">
                <div class="message-content">
                    <p>👋 Hello! Welcome to Premila Vithaldas Polytechnic. How can I help you today?</p>
                    <span class="message-time">Just now</span>
                </div>
            </div>
            <div class="message bot-message">
                <div class="message-content">
                    <p>You can ask me about:</p>
                    <ul class="info-list">
                        <li>📚 Courses & Programs</li>
                        <li>🏫 Departments</li>
                        <li>👩‍🏫 Faculty Information</li>
                        <li>📝 Admission Process</li>
                        <li>📍 Campus Location</li>
                    </ul>
                </div>
            </div>
            <div class="message bot-message">
                <div class="message-content">
                    <p>Please fill out the form below, and we'll get back to you shortly!</p>
                </div>
            </div>
            
            <!-- Quick Reply Buttons -->
            <div id="quick-replies" class="quick-replies">
                <button class="quick-reply-btn" data-message="Tell me about courses">📚 Courses</button>
                <button class="quick-reply-btn" data-message="What departments do you have?">🏫 Departments</button>
                <button class="quick-reply-btn" data-message="Tell me about faculty">👩‍🏫 Faculty</button>
                <button class="quick-reply-btn" data-message="How to get admission?">📝 Admission</button>
                <button class="quick-reply-btn" data-message="Where is the campus located?">📍 Location</button>
            </div>
        </div>

        <!-- Chatbot Form -->
        <div id="chatbot-form-container" class="chatbot-form-container">
            <form id="enquiry-form" class="chatbot-form">
                @csrf
                <div class="form-group">
                    <input type="text" id="chatbot-name" name="name" class="form-input" 
                           placeholder="Your Name *" required maxlength="255">
                </div>
                <div class="form-group">
                    <input type="tel" id="chatbot-phone" name="phone" class="form-input" 
                           placeholder="Phone Number *" required maxlength="20" 
                           pattern="[0-9+\-\s()]+">
                </div>
                <div class="form-group">
                    <input type="email" id="chatbot-email" name="email" class="form-input" 
                           placeholder="Email (optional)" maxlength="255">
                </div>
                <div class="form-group">
                    <textarea id="chatbot-message" name="message" class="form-input form-textarea" 
                              placeholder="Your Message (optional)" maxlength="1000"></textarea>
                </div>
                <button type="submit" class="submit-btn">
                    <span id="submit-text">Submit Enquiry</span>
                    <span id="submit-loading" style="display: none;">
                        <svg class="loading-spinner" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 12a9 9 0 11-6.219-8.56"></path>
                        </svg>
                        Sending...
                    </span>
                </button>
            </form>
        </div>

        <!-- Chat Input (Hidden initially) -->
        <div id="chat-input-container" class="chat-input-container" style="display: none;">
            <div class="chat-input-wrapper">
                <input type="text" id="chat-input" class="chat-input" 
                       placeholder="Type your message..." maxlength="500">
                <button id="chat-send-btn" class="chat-send-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Chatbot Footer -->
        <div class="chatbot-footer">
            <p>Powered by SNDT College Management System</p>
        </div>
    </div>
</div>

<style>
/* Chatbot Widget Styles */
#chatbot-widget {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 9999;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
}

/* Toggle Button */
.chatbot-toggle-btn {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    transition: all 0.3s ease;
    position: relative;
}

.chatbot-toggle-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 16px rgba(102, 126, 234, 0.6);
}

.chatbot-toggle-btn svg {
    transition: transform 0.3s ease;
}

.chatbot-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: #ff4757;
    color: white;
    border-radius: 50%;
    width: 22px;
    height: 22px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: bold;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

/* Chatbot Window */
.chatbot-window {
    position: absolute;
    bottom: 80px;
    right: 0;
    width: 380px;
    height: 600px;
    background: white;
    border-radius: 16px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px) scale(0.95);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.chatbot-window.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0) scale(1);
}

/* Header */
.chatbot-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 20px;
    color: white;
}

.chatbot-header-content {
    display: flex;
    align-items: center;
    gap: 12px;
}

.chatbot-avatar {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.chatbot-title {
    margin: 0;
    font-size: 16px;
    font-weight: 600;
}

.chatbot-status {
    margin: 2px 0 0;
    font-size: 12px;
    opacity: 0.9;
}

/* Messages */
.chatbot-messages {
    flex: 1;
    overflow-y: auto;
    padding: 20px;
    background: #f8f9fa;
}

.message {
    margin-bottom: 16px;
    display: flex;
}

.bot-message {
    justify-content: flex-start;
}

.message-content {
    max-width: 85%;
    background: white;
    padding: 12px 16px;
    border-radius: 12px;
    border-bottom-left-radius: 4px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.message-content p {
    margin: 0 0 8px;
    font-size: 14px;
    line-height: 1.5;
    color: #333;
}

.message-content p:last-child {
    margin-bottom: 0;
}

.message-time {
    font-size: 11px;
    color: #999;
}

.info-list {
    list-style: none;
    padding: 0;
    margin: 8px 0 0;
}

.info-list li {
    padding: 4px 0;
    font-size: 13px;
    color: #555;
}

/* Quick Reply Buttons */
.quick-replies {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    padding: 12px 20px;
    background: #f8f9fa;
    border-top: 1px solid #e5e7eb;
}

.quick-reply-btn {
    background: white;
    border: 2px solid #667eea;
    color: #667eea;
    padding: 8px 14px;
    border-radius: 20px;
    font-size: 13px;
    cursor: pointer;
    transition: all 0.2s ease;
    font-weight: 500;
}

.quick-reply-btn:hover {
    background: #667eea;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(102, 126, 234, 0.3);
}

/* Chat Input */
.chat-input-container {
    padding: 12px 20px;
    background: white;
    border-top: 1px solid #e5e7eb;
}

.chat-input-wrapper {
    display: flex;
    gap: 8px;
    align-items: center;
}

.chat-input {
    flex: 1;
    padding: 10px 14px;
    border: 2px solid #e5e7eb;
    border-radius: 20px;
    font-size: 14px;
    transition: all 0.2s ease;
}

.chat-input:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.chat-send-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    transition: all 0.2s ease;
}

.chat-send-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
}

.chat-send-btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none;
}

/* Form */
.chatbot-form-container {
    padding: 20px;
    background: white;
    border-top: 1px solid #e5e7eb;
}

.chatbot-form {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.form-group {
    margin: 0;
}

.form-input {
    width: 100%;
    padding: 10px 14px;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    font-size: 14px;
    transition: all 0.2s ease;
    font-family: inherit;
}

.form-input:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.form-textarea {
    resize: vertical;
    min-height: 60px;
    max-height: 120px;
}

.submit-btn {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
}

.submit-btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none;
}

.loading-spinner {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* Footer */
.chatbot-footer {
    padding: 12px;
    text-align: center;
    background: #f8f9fa;
    border-top: 1px solid #e5e7eb;
}

.chatbot-footer p {
    margin: 0;
    font-size: 11px;
    color: #999;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    #chatbot-widget {
        bottom: 10px;
        right: 10px;
    }

    .chatbot-toggle-btn {
        width: 50px;
        height: 50px;
    }

    .chatbot-window {
        width: calc(100vw - 20px);
        height: calc(100vh - 100px);
        bottom: 70px;
        right: -10px;
        border-radius: 12px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatbotToggle = document.getElementById('chatbot-toggle');
    const chatbotWindow = document.getElementById('chatbot-window');
    const chatbotIcon = document.getElementById('chatbot-icon');
    const closeIcon = document.getElementById('close-icon');
    const chatbotBadge = document.getElementById('chatbot-badge');
    const enquiryForm = document.getElementById('enquiry-form');
    const submitText = document.getElementById('submit-text');
    const submitLoading = document.getElementById('submit-loading');
    const chatInput = document.getElementById('chat-input');
    const chatSendBtn = document.getElementById('chat-send-btn');
    const chatInputContainer = document.getElementById('chat-input-container');
    const chatbotFormContainer = document.getElementById('chatbot-form-container');
    const quickReplies = document.getElementById('quick-replies');

    // Toggle chatbot window
    chatbotToggle.addEventListener('click', function() {
        chatbotWindow.classList.toggle('active');
        
        if (chatbotWindow.classList.contains('active')) {
            chatbotIcon.style.display = 'none';
            closeIcon.style.display = 'block';
            chatbotBadge.style.display = 'none';
        } else {
            chatbotIcon.style.display = 'block';
            closeIcon.style.display = 'none';
        }
    });

    // Handle form submission
    enquiryForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const submitBtn = this.querySelector('.submit-btn');
        
        // Disable button and show loading
        submitBtn.disabled = true;
        submitText.style.display = 'none';
        submitLoading.style.display = 'flex';

        fetch('{{ route("enquiry.store") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || 
                                 document.querySelector('[name="_token"]')?.value || ''
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Add success message
                addMessage('user', 'Form submitted successfully!', 'Just now');
                addMessage('bot', '✅ ' + data.message, 'Just now');
                
                // Hide form and quick replies, show chat input
                chatbotFormContainer.style.display = 'none';
                quickReplies.style.display = 'none';
                chatInputContainer.style.display = 'block';
                
                // Add helpful message
                setTimeout(() => {
                    addMessage('bot', '💡 Now you can ask me anything about our college! Try clicking the quick reply buttons above or type your question.', 'Just now');
                }, 1000);
                
                // Re-enable button
                submitBtn.disabled = false;
                submitText.style.display = 'inline';
                submitLoading.style.display = 'none';
            } else {
                throw new Error('Submission failed');
            }
        })
        .catch(error => {
            addMessage('bot', '❌ Sorry, there was an error submitting your enquiry. Please try again or contact us directly.', 'Just now');
            
            // Re-enable button
            submitBtn.disabled = false;
            submitText.style.display = 'inline';
            submitLoading.style.display = 'none';
        });
    });

    // Handle quick reply buttons
    document.querySelectorAll('.quick-reply-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const message = this.getAttribute('data-message');
            sendChatMessage(message);
        });
    });

    // Handle chat input send button
    chatSendBtn.addEventListener('click', function() {
        const message = chatInput.value.trim();
        if (message) {
            sendChatMessage(message);
            chatInput.value = '';
        }
    });

    // Handle enter key in chat input
    chatInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            const message = chatInput.value.trim();
            if (message) {
                sendChatMessage(message);
                chatInput.value = '';
            }
        }
    });

    // Send chat message to backend
    function sendChatMessage(message) {
        // Add user message to chat
        addMessage('user', message, 'Just now');
        
        // Disable input while processing
        chatInput.disabled = true;
        chatSendBtn.disabled = true;
        
        // Show typing indicator
        const typingIndicator = addTypingIndicator();
        
        // Get department ID from data attribute if available
        const departmentId = document.getElementById('chatbot-widget')?.getAttribute('data-department-id');
        
        // Prepare request body
        const requestBody = { message: message };
        if (departmentId) {
            requestBody.department_id = parseInt(departmentId);
        }
        
        // Send to backend
        fetch('{{ route("chatbot.chat") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || 
                                 document.querySelector('[name="_token"]')?.value || ''
            },
            body: JSON.stringify(requestBody)
        })
        .then(response => response.json())
        .then(data => {
            // Remove typing indicator
            typingIndicator.remove();
            
            if (data.success) {
                // Format response (convert markdown-like formatting to HTML)
                const formattedResponse = formatResponse(data.response);
                addMessage('bot', formattedResponse, 'Just now', true);
            } else {
                addMessage('bot', '❌ Sorry, I could not process your request. Please try again.', 'Just now');
            }
            
            // Re-enable input
            chatInput.disabled = false;
            chatSendBtn.disabled = false;
            chatInput.focus();
        })
        .catch(error => {
            // Remove typing indicator
            typingIndicator.remove();
            
            addMessage('bot', '❌ Sorry, there was an error. Please try again.', 'Just now');
            
            // Re-enable input
            chatInput.disabled = false;
            chatSendBtn.disabled = false;
        });
    }

    // Add message to chat
    function addMessage(type, text, time, isHTML = false) {
        const messagesContainer = document.getElementById('chatbot-messages');
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${type === 'bot' ? 'bot-message' : 'user-message'}`;
        
        const content = isHTML ? text : escapeHtml(text);
        
        messageDiv.innerHTML = `
            <div class="message-content">
                <p>${content}</p>
                <span class="message-time">${time}</span>
            </div>
        `;
        
        messagesContainer.appendChild(messageDiv);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }

    // Add typing indicator
    function addTypingIndicator() {
        const messagesContainer = document.getElementById('chatbot-messages');
        const typingDiv = document.createElement('div');
        typingDiv.className = 'message bot-message';
        typingDiv.id = 'typing-indicator';
        
        typingDiv.innerHTML = `
            <div class="message-content">
                <p class="typing-text">Thinking<span class="dot">.</span><span class="dot">.</span><span class="dot">.</span></p>
            </div>
        `;
        
        messagesContainer.appendChild(typingDiv);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
        
        return typingDiv;
    }

    // Format response text (simple markdown to HTML)
    function formatResponse(text) {
        // Convert **bold** to <strong>
        text = text.replace(/\*\*(.+?)\*\*/g, '<strong>$1</strong>');
        
        // Convert newlines to <br>
        text = text.replace(/\n/g, '<br>');
        
        return text;
    }

    // Escape HTML to prevent XSS
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // Add user message styles dynamically
    const style = document.createElement('style');
    style.textContent = `
        .user-message {
            justify-content: flex-end;
        }
        .user-message .message-content {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 4px;
        }
        .user-message .message-content p {
            color: white;
        }
        .user-message .message-content .message-time {
            color: rgba(255, 255, 255, 0.8);
        }
        
        .typing-text {
            color: #999;
            font-style: italic;
        }
        
        .dot {
            animation: blink 1.4s infinite both;
        }
        
        .dot:nth-child(2) {
            animation-delay: 0.2s;
        }
        
        .dot:nth-child(3) {
            animation-delay: 0.4s;
        }
        
        @keyframes blink {
            0%, 100% { opacity: 0; }
            50% { opacity: 1; }
        }
    `;
    document.head.appendChild(style);
});
</script>
