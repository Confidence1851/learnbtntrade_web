<?php

namespace App\Traits;

use App\Repositories\Interfaces\AccountRepositoryInterface;
use App\Repositories\Interfaces\BankAccountRepositoryInterface;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\CourseSectionResourceRepositoryInterface;
use App\Repositories\Interfaces\AdminLogRepositoryInterface;
use App\Repositories\Interfaces\AdvertMediaRepositoryInterface;
use App\Repositories\Interfaces\AdvertRepositoryInterface;
use App\Repositories\Interfaces\AgentRepositoryInterface;
use App\Repositories\Interfaces\AgentCourseRepositoryInterface;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\CountryStateRepositoryInterface;
use App\Repositories\Interfaces\DepositRepositoryInterface;
use App\Repositories\Interfaces\ErrorLogRepositoryInterface;
use App\Repositories\Interfaces\FiatTransferRepositoryInterface;
use App\Repositories\Interfaces\CourseCategoryRepositoryInterface;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Repositories\Interfaces\PostCategoryRepositoryInterface;
use App\Repositories\Interfaces\PostCommentRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\ReferralRepositoryInterface;
use App\Repositories\Interfaces\SettingRepositoryInterface;
use App\Repositories\Interfaces\VerificationPinRepositoryInterface;
use App\Repositories\Interfaces\CourseSectionRepositoryInterface;

trait ModelIndex
{

    protected $Withdrawal;
    protected $BankAccount;
    protected $Country;
    protected $CountryState;
    protected $ErrorLog;
    protected $NewsLetterSubscriber;
    protected $User;
    protected $PostCategory;
    protected $PostComment;
    protected $Post;
    protected $Course;
    protected $CourseCategory;
    protected $CourseSection;
    protected $CourseSectionResource;
    protected $Referral;
    protected $Setting;
    protected $VerificationPin;
    protected $AdminLog;
    protected $Notification;

    public function __construct(
        UserRepositoryInterface $userRepositoryInterface,
        PostCategoryRepositoryInterface $postCategoryRepositoryInterface,
        PostCommentRepositoryInterface $postCommentRepositoryInterface,
        PostRepositoryInterface $postRepositoryInterface,
        CourseRepositoryInterface $courseRepositoryInterface ,
        // CouponRepositoryInterface $couponRepositoryInterface ,
        // BankAccountRepositoryInterface $bankAccountRepositoryInterface ,
        // AccountRepositoryInterface $accountRepositoryInterface ,
        CourseCategoryRepositoryInterface $courseCategoryRepositoryInterface ,
        CourseSectionRepositoryInterface $courseSectionRepositoryInterface ,
        CourseSectionResourceRepositoryInterface $courseSectioResourceRepositoryInterface,
        ReferralRepositoryInterface $referralRepositoryInterface
        // AgentRepositoryInterface $agentRepositoryInterface ,
        // AgentCourseRepositoryInterface $agentCourseRepositoryInterface ,
        // SettingRepositoryInterface $settingRepositoryInterface ,
        // VerificationPinRepositoryInterface $verificationPinRepositoryInterface ,
        // FiatTransferRepositoryInterface $fiatTransferRepositoryInterface ,
        // DepositRepositoryInterface $depositRepositoryInterface ,
        // AdminLogRepositoryInterface $adminLogRepositoryInterface ,
        // AdvertRepositoryInterface $advertRepositoryInterface ,
        // AdvertMediaRepositoryInterface $advertMediaRepositoryInterface ,
        // CountryRepositoryInterface $countryRepositoryInterface ,
        // CountryStateRepositoryInterface $countryStatetateRepositoryInterface ,
        // NotificationRepositoryInterface $notificationRepositoryInterface ,
        // ErrorLogRepositoryInterface $errorlogRepositoryInterface
    ){
        $this->User = $userRepositoryInterface;
        $this->PostCategory = $postCategoryRepositoryInterface;
        $this->PostComment = $postCommentRepositoryInterface;
        $this->Post = $postRepositoryInterface;
        $this->Course = $courseRepositoryInterface;
        // $this->Coupon = $couponRepositoryInterface;
        // $this->BankAccount = $bankAccountRepositoryInterface;
        // $this->Account = $accountRepositoryInterface;
        $this->CourseCategory = $courseCategoryRepositoryInterface;
        $this->CourseSection = $courseSectionRepositoryInterface;
        $this->CourseSectionResource = $courseSectioResourceRepositoryInterface;
        $this->Referral = $referralRepositoryInterface;
        // $this->Agent = $agentRepositoryInterface;
        // $this->AgentCourse = $agentCourseRepositoryInterface;
        // $this->Setting = $settingRepositoryInterface;
        // $this->VerificationPin = $verificationPinRepositoryInterface;
        // $this->FiatTransfer = $fiatTransferRepositoryInterface;
        // $this->Deposit = $depositRepositoryInterface;
        // $this->AdminLog = $adminLogRepositoryInterface;
        // $this->Advert = $advertRepositoryInterface;
        // $this->AdvertMedia = $advertMediaRepositoryInterface;
        // $this->Country = $countryRepositoryInterface;
        // $this->CountryState = $countryStatetateRepositoryInterface;
        // $this->Notification = $notificationRepositoryInterface;
        // $this->ErrorLog = $errorlogRepositoryInterface;

    }
}
