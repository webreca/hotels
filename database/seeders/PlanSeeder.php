<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\PlanBenefits;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bluePlan           = Plan::create([
            'name'          => 'Blue',
            'description'   => 'Blue Plan',
            'price'         => 199,
            'discount_type' => 'percentage',
            'discount_name' => 'Early Bird Discount',
            'discount'      => 50,
            'validity'      => 6,
            'image'         => 'blue-plan.png',
            'color'         => '#2296D7',
            'active'        => 'Yes',
        ]);

        PlanBenefits::create([
            'plan_id'       => $bluePlan->id,
            'title'         => 'Reward night after 7 room nights',
            'description'   => 'Earn 1 night as reward night',
        ]);
        PlanBenefits::create([
            'plan_id'       => $bluePlan->id,
            'title'         => '10% discount on base hotels',
            'description'   => 'Set two wizard hotels as base hotels.',
        ]);
        PlanBenefits::create([
            'plan_id'       => $bluePlan->id,
            'title'         => '5% discount on Wizard hotels',
            'description'   => '5% extra discount on all bookings on Wizard network hotels'
        ]);
        PlanBenefits::create([
            'plan_id'       => $bluePlan->id,
            'title'         => 'Partner coupons worth Rs.3500',
            'description'   => 'Rs.3500 worth of external partner coupons',
        ]);

        PlanBenefits::create([
            'plan_id'       => $bluePlan->id,
            'title'         => 'Free Membership Renewal',
            'description'   => 'If total benefits availed are less than the amount of membership fee.',
        ]);

        PlanBenefits::create([
            'plan_id'       => $bluePlan->id,
            'title'         => 'Validity',
            'description'   => '6 months',
        ]);

        $silverPlan         = Plan::create([
            'name'          => 'Silver',
            'description'   => 'Silver Plan',
            'price'         => 399,
            'discount_type' => 'percentage',
            'discount_name' => 'Early Bird Discount',
            'discount'      => 50,
            'validity'      => 12,
            'image'         => 'silver-plan.png',
            'color'         => '#FAFAFA',
            'active'        => 'Yes',
        ]);

        PlanBenefits::create([
            'plan_id'       => $silverPlan->id,
            'title'         => 'Reward night after 6 room nights',
            'description'   => 'Earn 1 night as reward night',
        ]);
        PlanBenefits::create([
            'plan_id'       => $silverPlan->id,
            'title'         => '10% discount on base hotels',
            'description'   => 'Set two wizard hotels as base hotels.',
        ]);
        PlanBenefits::create([
            'plan_id'       => $silverPlan->id,
            'title'         => '5% discount on Wizard hotels',
            'description'   => '5% extra discount on all bookings on Wizard network hotels'
        ]);
        PlanBenefits::create([
            'plan_id'       => $silverPlan->id,
            'title'         => 'Exclusive benefits',
            'description'   => 'Priority Customer Support',
        ]);
        PlanBenefits::create([
            'plan_id'       => $silverPlan->id,
            'title'         => 'Partner coupons worth Rs.5500',
            'description'   => 'Rs.5500 worth of external partner coupons',
        ]);

        PlanBenefits::create([
            'plan_id'       => $silverPlan->id,
            'title'         => 'Super Discount Coupon(s)',
            'description'   => '40% super discount coupon x 1',
        ]);

        PlanBenefits::create([
            'plan_id'       => $silverPlan->id,
            'title'         => 'Free Membership Renewal',
            'description'   => 'If total benefits availed are less than the amount of membership fee.',
        ]);

        PlanBenefits::create([
            'plan_id'       => $silverPlan->id,
            'title'         => 'Validity',
            'description'   => '12 months',
        ]);

        $goldPlan           = Plan::create([
            'name'          => 'Gold',
            'description'   => 'Gold Plan',
            'price'         => 799,
            'discount_type' => 'percentage',
            'discount_name' => 'Early Bird Discount',
            'discount'      => 50,
            'validity'      => 12,
            'image'         => 'gold-plan.png',
            'color'         => '#DA933F',
            'active'        => 'Yes',
        ]);

        PlanBenefits::create([
            'plan_id'       => $goldPlan->id,
            'title'         => 'Reward night after 5 room nights',
            'description'   => 'Earn 1 night as reward night',
        ]);
        PlanBenefits::create([
            'plan_id'       => $goldPlan->id,
            'title'         => '10% discount on base hotels',
            'description'   => 'Set two wizard hotels as base hotels.',
        ]);
        PlanBenefits::create([
            'plan_id'       => $goldPlan->id,
            'title'         => '5% discount on Wizard hotels',
            'description'   => '5% extra discount on all bookings on Wizard network hotels'
        ]);
        PlanBenefits::create([
            'plan_id'       => $goldPlan->id,
            'title'         => 'Exclusive benefits',
            'description'   => 'Priority Customer Support, Pay at Hotel for any booking',
        ]);
        PlanBenefits::create([
            'plan_id'       => $goldPlan->id,
            'title'         => 'Partner coupons worth Rs.5500',
            'description'   => 'Rs.5500 worth of external partner coupons',
        ]);

        PlanBenefits::create([
            'plan_id'       => $goldPlan->id,
            'title'         => 'Super Discount Coupon(s)',
            'description'   => '40% super discount coupon x 1',
        ]);

        PlanBenefits::create([
            'plan_id'       => $goldPlan->id,
            'title'         => 'Free Membership Renewal',
            'description'   => 'If total benefits availed are less than the amount of membership fee.',
        ]);

        PlanBenefits::create([
            'plan_id'       => $goldPlan->id,
            'title'         => 'Validity',
            'description'   => '12 months',
        ]);
    }
}
