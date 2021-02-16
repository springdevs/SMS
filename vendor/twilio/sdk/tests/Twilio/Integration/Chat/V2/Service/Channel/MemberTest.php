<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Chat\V2\Service\Channel;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class MemberTest extends HolodeckTestCase {
    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->chat->v2->services("ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                   ->channels("CHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                   ->members("MBXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://chat.twilio.com/v2/Services/ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Channels/CHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Members/MBXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "MBaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "channel_sid": "CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "service_sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "identity": "jing",
                "role_sid": "RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "last_consumed_message_index": null,
                "last_consumption_timestamp": null,
                "date_created": "2016-03-24T21:05:50Z",
                "date_updated": "2016-03-24T21:05:50Z",
                "attributes": "{}",
                "url": "https://chat.twilio.com/v2/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Members/MBaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->chat->v2->services("ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->channels("CHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->members("MBXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();

        $this->assertNotNull($actual);
    }

    public function testCreateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        $options = ['xTwilioWebhookEnabled' => "true", ];

        try {
            $this->twilio->chat->v2->services("ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                   ->channels("CHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                   ->members->create("identity", $options);
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = ['Identity' => "identity", ];

        $headers = ['X-Twilio-Webhook-Enabled' => "true", ];

        $this->assertRequest(new Request(
            'post',
            'https://chat.twilio.com/v2/Services/ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Channels/CHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Members',
            [],
            $values,
            $headers
        ));
    }

    public function testCreateResponse(): void {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "sid": "MBaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "channel_sid": "CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "service_sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "identity": "jing",
                "role_sid": "RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "last_consumed_message_index": null,
                "last_consumption_timestamp": null,
                "date_created": "2016-03-24T21:05:50Z",
                "date_updated": "2016-03-24T21:05:50Z",
                "attributes": "{}",
                "url": "https://chat.twilio.com/v2/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Members/MBaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->chat->v2->services("ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->channels("CHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->members->create("identity");

        $this->assertNotNull($actual);
    }

    public function testReadRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->chat->v2->services("ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                   ->channels("CHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                   ->members->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://chat.twilio.com/v2/Services/ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Channels/CHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Members'
        ));
    }

    public function testReadFullResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://chat.twilio.com/v2/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Members?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://chat.twilio.com/v2/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Members?PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "members"
                },
                "members": [
                    {
                        "sid": "MBaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "channel_sid": "CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "service_sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "identity": "jing",
                        "role_sid": "RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "last_consumed_message_index": null,
                        "last_consumption_timestamp": null,
                        "date_created": "2016-03-24T21:05:50Z",
                        "date_updated": "2016-03-24T21:05:50Z",
                        "attributes": "{}",
                        "url": "https://chat.twilio.com/v2/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Members/MBaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                    }
                ]
            }
            '
        ));

        $actual = $this->twilio->chat->v2->services("ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->channels("CHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->members->read();

        $this->assertGreaterThan(0, \count($actual));
    }

    public function testReadEmptyResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://chat.twilio.com/v2/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Members?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://chat.twilio.com/v2/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Members?PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "members"
                },
                "members": []
            }
            '
        ));

        $actual = $this->twilio->chat->v2->services("ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->channels("CHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->members->read();

        $this->assertNotNull($actual);
    }

    public function testDeleteRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        $options = ['xTwilioWebhookEnabled' => "true", ];

        try {
            $this->twilio->chat->v2->services("ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                   ->channels("CHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                   ->members("MBXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->delete($options);
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $headers = ['X-Twilio-Webhook-Enabled' => "true", ];

        $this->assertRequest(new Request(
            'delete',
            'https://chat.twilio.com/v2/Services/ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Channels/CHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Members/MBXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
            [],
            [],
            $headers
        ));
    }

    public function testDeleteResponse(): void {
        $this->holodeck->mock(new Response(
            204,
            null
        ));

        $actual = $this->twilio->chat->v2->services("ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->channels("CHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->members("MBXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->delete();

        $this->assertTrue($actual);
    }

    public function testUpdateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        $options = ['xTwilioWebhookEnabled' => "true", ];

        try {
            $this->twilio->chat->v2->services("ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                   ->channels("CHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                   ->members("MBXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update($options);
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $headers = ['X-Twilio-Webhook-Enabled' => "true", ];

        $this->assertRequest(new Request(
            'post',
            'https://chat.twilio.com/v2/Services/ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Channels/CHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Members/MBXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
            [],
            [],
            $headers
        ));
    }

    public function testUpdateRoleSidResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "MBaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "channel_sid": "CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "service_sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "identity": "jing",
                "role_sid": "RLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "last_consumed_message_index": 20,
                "last_consumption_timestamp": "2016-03-24T21:05:52Z",
                "date_created": "2016-03-24T21:05:50Z",
                "date_updated": "2016-03-24T21:05:51Z",
                "attributes": "{}",
                "url": "https://chat.twilio.com/v2/Services/ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/CHaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Members/MBaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->chat->v2->services("ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->channels("CHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->members("MBXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update();

        $this->assertNotNull($actual);
    }
}