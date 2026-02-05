<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Notification</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f3f4f6;
            padding: 32px 16px;
            line-height: 1.6;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .email-header {
            padding: 32px 24px;
            color: #ffffff;
            display: flex;
            align-items: center;
        }

        .email-header.created {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        .email-header.updated {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }

        .email-header.deleted {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        }

        .header-icon {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            padding: 12px;
            margin-right: 16px;
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-icon svg {
            width: 32px;
            height: 32px;
        }

        .header-content h1 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .header-content p {
            font-size: 14px;
            opacity: 0.9;
        }

        .email-body {
            padding: 32px 24px;
        }

        .message-box {
            background-color: #f9fafb;
            border-radius: 8px;
            padding: 24px;
            margin-bottom: 24px;
        }

        .message-box p {
            color: #374151;
            font-size: 16px;
            line-height: 1.6;
        }

        .message-box .student-name {
            font-weight: 600;
            color: #111827;
        }

        .student-details {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 24px;
        }

        .student-details h2 {
            font-size: 12px;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 16px;
        }

        .detail-row {
            display: flex;
            margin-bottom: 8px;
        }

        .detail-row:last-child {
            margin-bottom: 0;
        }

        .detail-label {
            color: #6b7280;
            width: 100px;
            flex-shrink: 0;
        }

        .detail-value {
            font-weight: 500;
            color: #111827;
        }

        .cta-container {
            text-align: center;
        }

        .cta-button {
            display: inline-block;
            background-color: #2563eb;
            color: #ffffff;
            font-weight: 600;
            padding: 12px 32px;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
        }

        .cta-button:hover {
            background-color: #1d4ed8;
            box-shadow: 0 6px 8px rgba(37, 99, 235, 0.3);
        }

        .email-footer {
            background-color: #f9fafb;
            padding: 16px 24px;
            border-top: 1px solid #e5e7eb;
        }

        .email-footer p {
            color: #6b7280;
            font-size: 14px;
            text-align: center;
        }

        @media (max-width: 600px) {
            body {
                padding: 16px 8px;
            }

            .email-header {
                padding: 24px 16px;
            }

            .email-body {
                padding: 24px 16px;
            }

            .header-content h1 {
                font-size: 20px;
            }

            .detail-row {
                flex-direction: column;
            }

            .detail-label {
                margin-bottom: 4px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header {{ $action }}">
            <div class="header-icon">
                @if($action === 'created')
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                @elseif($action === 'updated')
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                @elseif($action === 'deleted')
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                @endif
            </div>

            <div class="header-content">
                <h1>
                    @if($action === 'created') Student Created
                    @elseif($action === 'updated') Student Updated
                    @elseif($action === 'deleted') Student Deleted
                    @endif
                </h1>
                <p>Student Management System</p>
            </div>
        </div>

        <!-- Body -->
        <div class="email-body">
            <div class="message-box">
                <p>
                    @if($action === 'created')
                        A new student record has been successfully created for
                        <span class="student-name">{{ $student->name }}</span>.
                    @elseif($action === 'updated')
                        The student record for
                        <span class="student-name">{{ $student->name }}</span>
                        has been updated.
                    @elseif($action === 'deleted')
                        The student record for
                        <span class="student-name">{{ $student->name }}</span>
                        has been deleted from the system.
                    @endif
                </p>
            </div>

            @if($action !== 'deleted')
                <!-- Student Details -->
                <div class="student-details">
                    <h2>Student Information</h2>
                    <div class="detail-row">
                        <span class="detail-label">Name:</span>
                        <span class="detail-value">{{ $student->name }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Grade:</span>
                        <span class="detail-value">{{ $student->grade }}</span>
                    </div>
                    @if($student->interests)
                        <div class="detail-row">
                            <span class="detail-label">Interests:</span>
                            <span class="detail-value">{{ $student->interests }}</span>
                        </div>
                    @endif
                </div>

                <!-- CTA Button -->
                <div class="cta-container">
                    <a href="{{ url('/students/' . $student->id) }}" class="cta-button">
                        View Student Details
                    </a>
                </div>
            @endif
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>This is an automated notification from the Student Management System</p>
        </div>
    </div>
</body>
</html>
