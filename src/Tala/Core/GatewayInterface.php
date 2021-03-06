<?php

/*
 * This file is part of the Tala Payments package.
 *
 * (c) Adrian Macneil <adrian@adrianmacneil.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tala\Core;

use Tala\Core\Request;

/**
 * Payment gateway interface
 */
interface GatewayInterface
{
    /**
     * Create a new gateway using an associative array of settings.
     */
    public function __construct($settings);

    /**
     * Initialize the gateway with an associative array of settings.
     */
    public function initialize($settings);

    /**
     * Get settings which can be displayed for user configuration.
     */
    public function getDefaultSettings();

    /**
     * Authorizes a new payment.
     */
    public function authorize(Request $request, $source);

    /**
     * Handles return from an authorization.
     */
    public function completeAuthorize(Request $request);

    /**
     * Capture an authorized payment.
     */
    public function capture(Request $request);

    /**
     * Creates a new charge (combined authorize + capture).
     */
    public function purchase(Request $request, $source);

    /**
     * Handle return from a purchase.
     */
    public function completePurchase(Request $request);

    /**
     * Refund an existing transaction.
     * Generally this will refund a transaction which has been already submitted for processing,
     * and may be called up to 30 days after submitting the transaction.
     */
    public function refund(Request $request);

    /**
     * Void an existing transaction.
     * Generally this will prevent the transaction from being submitted for processing,
     * and can only be called up to 24 hours after submitting the transaction.
     */
    public function void(Request $request);
}
